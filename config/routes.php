<?php

declare(strict_types=1);

use App\User\UserController;
use App\Contact\ContactController;
use App\Controller\SiteController;
use Yiisoft\Http\Method;
use Yiisoft\Router\Route;

return [
    Route::get('/', [SiteController::class, 'index'])->name('site/index'),
    Route::get('/about', [SiteController::class, 'about'])->name('site/about'),
    Route::methods([Method::GET, Method::POST], '/contact', [ContactController::class, 'contact'])
        ->name('contact/form'),

    // auth
    Route::methods([Method::GET, Method::POST],'/user/register', [UserController::class, 'register'])->name('user/register'),
    Route::methods([Method::GET, Method::POST],'/user/login', [UserController::class, 'login'])->name('user/login'),
    Route::methods([Method::GET, Method::POST],'/user/logout', [UserController::class, 'logout'])->name('user/logout'),

    // test
    Route::get('/test', [SiteController::class, 'test'])->name('site/test'),
];
