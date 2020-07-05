<?php

declare(strict_types=1);

namespace App\User;

use Yiisoft\Http\Header;
use Yiisoft\Http\Method;
use Yiisoft\Yii\Web\Flash;
use App\User\Form\LoginForm;
use App\User\Form\RegisterForm;
use App\User\Service\LoginService;
use Yiisoft\Yii\Web\Middleware\Csrf;
use App\User\Service\RegisterService;
use App\Controller\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Yiisoft\Router\UrlGeneratorInterface;
use Psr\Http\Message\ServerRequestInterface;
use Yiisoft\Yii\Web\User\User as UserService;

class UserController extends AbstractController
{
    public function login(LoginForm $form, Flash $flash, LoginService $service, UrlGeneratorInterface $url, ServerRequestInterface $request): ResponseInterface
    {
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === Method::POST) && $form->load($body) && $form->validate()) {

            $logged = $service->login($form->getAttributeValue('username'), $form->getAttributeValue('password'));

            if ($logged) {
                return $this->responseFactory->createResponse(302)
                    ->withHeader(Header::LOCATION, $url->generate('site/index'));
            }

            $flash->add('is-danger', ['header' => 'Wrong login or password.'], true);
        }

        return $this->render('user/login', [
            'csrf' => $request->getAttribute(Csrf::REQUEST_NAME),
            'form' => $form,
        ]);
    }

    public function logout(UserService $user, UrlGeneratorInterface $url): ResponseInterface
    {
        $user->logout();

        return $this->responseFactory->createResponse(302)
            ->withHeader(Header::LOCATION, $url->generate('site/index'));
    }

    public function register(RegisterForm $form, Flash $flash, UrlGeneratorInterface $url, ServerRequestInterface $request, RegisterService $service): ResponseInterface
    {
        $body = $request->getParsedBody();
        $method = $request->getMethod();

        if (($method === Method::POST) && $form->load($body) && $form->validate()) {

            $service->register($form->getAttributeValue('username'), $form->getAttributeValue('email'), $form->getAttributeValue('password'));

            $flash->add('is-success', ['header' => 'Success. Confirmation has been sent to your email address.'], true);

            return $this->responseFactory->createResponse(302)
                ->withHeader(Header::LOCATION, $url->generate('user/login'));
        }

        return $this->render('user/register', [
            'csrf' => $request->getAttribute(Csrf::REQUEST_NAME),
            'form' => $form,
        ]);
    }

    public function getViewPath(): string
    {
        return $this->aliases->get('@views');
    }
}
