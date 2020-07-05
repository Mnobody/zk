<?php

declare(strict_types=1);

use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;

/* @var string|null $csrf */
/* @var Yiisoft\Form\Widget\Field $field */
/* @var App\User\Form\LoginForm $form */
/* @var Yiisoft\Router\UrlGeneratorInterface $url */

?>
<div class="column is-4 is-offset-4">

    <p class="subtitle has-text-black">
        Login
    </p>

    <?= Form::begin()->action($url->generate('user/login'))->options([
        'id' => 'form-login',
        'csrf' => $csrf,
        'enctype' => 'multipart/form-data',
    ])->start() ?>

    <?= $field->config($form, 'username')->textInput() ?>
    <?= $field->config($form, 'password')->passwordInput() ?>

    <?= Html::submitButton('Login', [
        'class' => 'button is-block is-info is-fullwidth has-margin-top-15',
        'id' => 'contact-button',
        'tabindex' => '5'
    ]) ?>

    <?= Form::end() ?>

</div>
