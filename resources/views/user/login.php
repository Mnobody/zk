<?php

declare(strict_types=1);

use Yiisoft\Html\Html;
use Yiisoft\Form\Widget\Form;

/**
 * @var string|null $csrf
 * @var App\User\Form\LoginForm $form
 * @var Yiisoft\Form\Widget\Field $field
 * @var Yiisoft\Router\UrlGeneratorInterface $url
 */
?>

<div class="row mt-5">
    <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
        <div class="card shadow p-3 mb-5 rounded">
            <div class="card-body">
                <h5 class="card-title text-center">Login</h5>

                <?= Form::begin()->action($url->generate('user/login'))->options([
                    'id' => 'form-login',
                    'csrf' => $csrf,
                ])->start() ?>

                <?= $field->config($form, 'username')->textInput() ?>
                <?= $field->config($form, 'password')->passwordInput() ?>

                <?= Html::submitButton('Login', [
                    'id' => 'login-button',
                    'class' => 'btn btn-primary btn-block my-3',
                ]) ?>

                <?= Form::end() ?>

            </div>
        </div>
    </div>
</div>
