<?php

declare(strict_types=1);

use Yiisoft\Yii\Bootstrap5\Nav;
use Yiisoft\Yii\Bootstrap5\NavBar;

/**
 * @var Yiisoft\Yii\Web\User\User $user
 * @var Yiisoft\Router\UrlGeneratorInterface $url
 * @var Yiisoft\Router\UrlMatcherInterface $urlMatcher
 * @var App\ApplicationParameters $applicationParameters
 */

$currentUrl = $url->generate($urlMatcher->getCurrentRoute()->getName());
?>

<?php
    $left = [
        ['label' => 'About', 'url' => $url->generate('site/about')],
        ['label' => 'Contact', 'url' => $url->generate('contact/form')],
    ];
    if (!$user->isGuest()) {
        $left = array_merge($left, [
            ['label' => 'New Note', 'url' => $url->generate('note/create')],
            ['label' => 'List', 'url' => $url->generate('note/list')],
        ]);
    }

    $right = [
        ['label' => 'Login', 'url' => $url->generate('user/login')],
        ['label' => 'Register', 'url' => $url->generate('user/register')],
    ];
    if (!$user->isGuest()) {
        $label = implode(['Logout (', $user->getIdentity()->getUsername(), ')']);
        $right = [
            ['label' => $label, 'url' => $url->generate('user/logout')],
        ];
    }
?>

<?php
    echo NavBar::begin()
        ->brandLabel($applicationParameters->getName())
        ->brandUrl('/')
        ->options(['class' => 'navbar navbar-expand navbar-dark zk-navbar'])
        ->start();

    echo Nav::widget()
        ->currentPath($currentUrl)
        ->items($left)
        ->options(['class' => 'navbar-nav']);

    echo Nav::widget()
        ->currentPath($currentUrl)
        ->items($right)
        ->options(['class' => 'navbar-nav float-right ml-auto']);

    echo NavBar::end();
?>
