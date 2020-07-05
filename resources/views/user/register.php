<?php

declare(strict_types=1);

use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;

/* @var string|null $csrf */
/* @var Yiisoft\Form\Widget\Field $field */
/* @var App\User\Form\RegisterForm $form */
/* @var Yiisoft\Router\UrlGeneratorInterface $url */

?>
<div class="column is-4 is-offset-4">

    <p class="subtitle has-text-black">
        Registration
    </p>

    <?= Form::begin()->action($url->generate('user/register'))->options([
            'id' => 'form-register',
            'csrf' => $csrf,
            'enctype' => 'multipart/form-data',
        ])->start() ?>

    <?= $field->config($form, 'username')->textInput() ?>
    <?= $field->config($form, 'email')->textInput() ?>
    <?= $field->config($form, 'password')->passwordInput() ?>
    <?= $field->config($form, 'password_repeat')->passwordInput() ?>

    <?= Html::submitButton('Register', [
            'class' => 'button is-block is-info is-fullwidth has-margin-top-15',
            'id' => 'contact-button',
            'tabindex' => '5'
        ]) ?>

    <?= Form::end() ?>

</div>
