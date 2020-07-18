<?php

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Yiisoft\Aliases\Aliases;
use Yiisoft\View\ViewContextInterface;
use Yiisoft\View\WebView;
use Yiisoft\Yii\Web\User\User;
use Yiisoft\DataResponse\DataResponseFactoryInterface;

use function array_merge;

abstract class AbstractController implements ViewContextInterface
{
    private WebView $webView;
    protected Aliases $aliases;
    protected DataResponseFactoryInterface $responseFactory;
    protected User $user;

    public function __construct(Aliases $aliases, DataResponseFactoryInterface $responseFactory, WebView $webView, User $user) {
        $this->aliases = $aliases;
        $this->responseFactory = $responseFactory;
        $this->webView = $webView;
        $this->user = $user;
    }

    protected function render(string $view, array $parameters = []): ResponseInterface
    {
        $parameters = array_merge(['isGuest' => $this->user->isGuest()], $parameters);

        $content = $this->webView->render(
            '//main',
            array_merge(
                [
                    'content' => $this->webView->render($view, $parameters, $this)
                ],
                $parameters
            ),
            $this
        );

        return $this->responseFactory->createResponse($content);
    }

    abstract public function getViewPath(): string;
}
