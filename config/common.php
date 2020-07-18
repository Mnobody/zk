<?php

declare(strict_types=1);

use App\Service\Mailer;
use Yiisoft\Aliases\Aliases;
use App\Contact\ContactMailer;
use Yiisoft\Yii\Web\Session\Session;
use Psr\Container\ContainerInterface;
use Yiisoft\Yii\Web\Session\SessionInterface;
use Yiisoft\Auth\IdentityRepositoryInterface;
use Yiisoft\Validator\ValidatorFactory;
use Yiisoft\Validator\ValidatorFactoryInterface;

/* @var array $params */

return [
    ContainerInterface::class => static function (ContainerInterface $container) {
        return $container;
    },

    Aliases::class => [
        '__class' => Aliases::class,
        '__construct()' => [$params['aliases']],
    ],

    ContactMailer::class => static function (ContainerInterface $container) use ($params) {
        return (new ContactMailer(
            $container->get(Mailer::class),
            $params['mailer']['adminEmail']
        ));
    },

    SessionInterface::class => [
        '__class' => Session::class,
        '__construct()' => [
            $params['session']['options'] ?? [],
            $params['session']['handler'] ?? null,
        ],
    ],

    // User:
    IdentityRepositoryInterface::class => static function (ContainerInterface $container) {
        // instead of Cycle-based repository, any implementation could be used
        return $container->get(Cycle\ORM\ORMInterface::class)->getRepository(App\User\Entity\User::class);
    },

    ValidatorFactoryInterface::class => [
        '__class' => ValidatorFactory::class,
    ],
];
