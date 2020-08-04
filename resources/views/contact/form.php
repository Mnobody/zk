<?php

declare(strict_types=1);

use Yiisoft\Form\Widget\Form;
use Yiisoft\Html\Html;

/* @var App\Form\ContactForm $form */
/* @var Yiisoft\Router\UrlGeneratorInterface $url */
/* @var string|null $csrf */
/* @var Yiisoft\Form\Widget\Field $field */

$this->setTitle('contact');
?>


<div class="row mt-5">
    <div class="col-md-6 offset-md-3">
        <div class="card shadow p-3 mb-5 rounded">
            <div class="card-body">
                <h5 class="card-title text-center">Contact</h5>
                <h6 class="card-subtitle mb-2 text-muted text-center">Please fill out the following to Contact</h6>

                <?= Form::begin()
                    ->action($url->generate('contact/form'))
                    ->options(
                        [
                            'id' => 'form-contact',
                            'csrf' => $csrf,
                            'enctype' => 'multipart/form-data',
                        ]
                    )
                    ->start() ?>

                <?= $field->config($form, 'username') ?>
                <?= $field->config($form, 'email') ?>
                <?= $field->config($form, 'subject') ?>
                <?= $field->config($form, 'body')
                    ->textArea(['class' => 'form-control textarea', 'rows' => 2]) ?>
                <?= $field->config($form, 'attachFiles', ['class' => 'my-3'])
                    ->inputCssClass('file-input')
                    ->template(
                    '<div class="file form-file">
                            {input}
                            <label class="form-file-label" for="customFile">
                                <span class="form-file-text">Choose file...</span>
                                <span class="form-file-button">Browse</span>
                            </label>
                        </div>'
                        // todo: attach js. https://v5.getbootstrap.com/docs/5.0/forms/file/
                    )
                    ->fileInput(
                        ['type' => 'file', 'multiple' => 'multiple', 'name' => 'attachFiles[]', 'id' => 'customFile', 'class' => 'form-file-input'],
                        true,
                        ) ?>

                <?= Html::submitButton('Send mail ' . html::tag('i', '', ['class' => 'fas fa-share', 'aria-hidden' => 'true']), [
                    'id' => 'contact-button',
                    'class' => 'btn btn-primary btn-block mt-4',
                ]) ?>

                <?= Form::end() ?>

            </div>
        </div>
    </div>
</div>
