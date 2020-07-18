<?php

declare(strict_types=1);

use Yiisoft\Yii\Bulma\Nav;
use Yiisoft\Yii\Bulma\NavBar;

/* @var bool $isGuest */
/* @var App\ApplicationParameters $applicationParameters */
/* @var Yiisoft\Router\UrlGeneratorInterface $url */
/* @var Yiisoft\Router\UrlMatcherInterface $urlMatcher */

$currentUrl = $url->generate($urlMatcher->getCurrentRoute()->getName());
?>

<?= NavBar::begin()
    ->brandLabel($applicationParameters->getName())
    ->brandImage('/images/yii-logo.jpg')
    ->options(['class' => 'is-black', 'data-sticky' => '', 'data-sticky-shadow' => ''])
    ->itemsOptions(['class' => 'navbar-end'])
    ->start();
?>

<?php
    $items = [
        ['label' => 'About', 'url' => $url->generate('site/about')],
        ['label' => 'Contact', 'url' => $url->generate('contact/form')],
    ];

    if ($isGuest) {
        $items = array_merge($items, [
            ['label' => 'Login', 'url' => $url->generate('user/login')],
            ['label' => 'Register', 'url' => $url->generate('user/register')],
        ]);
    } else {
        $items = array_merge($items, [
            ['label' => 'Logout', 'url' => $url->generate('user/logout')],
        ]);
    }
?>
    <?= Nav::widget()
        ->currentPath($currentUrl)
        ->items($items) ?>

<?= NavBar::end();

