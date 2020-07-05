<?php

declare(strict_types=1);

namespace App\User\Form;

use Yiisoft\Form\FormModel;
use Yiisoft\Validator\Rule\CompareTo;
use Yiisoft\Validator\Rule\Email;
use Yiisoft\Validator\Rule\Required;

class LoginForm extends FormModel
{
    private string $username = '';
    private string $password = '';

    public function rules(): array
    {
        return [
            'username' => [new Required],
            'password' => [new Required],
        ];
    }
}
