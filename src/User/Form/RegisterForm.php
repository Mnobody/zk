<?php

declare(strict_types=1);

namespace App\User\Form;

use Yiisoft\Form\FormModel;
use Yiisoft\Validator\Rule\CompareTo;
use Yiisoft\Validator\Rule\Email;
use Yiisoft\Validator\Rule\Required;

class RegisterForm extends FormModel
{
    private string $username = '';
    private string $email = '';
    private string $password = '';
    private string $password_repeat = '';

    public function rules(): array
    {
        return [
            'username' => [new Required],
            'email' => [new Required, new Email],
            'password' => [new Required],
            'password_repeat' => [new Required, new CompareTo($this->password)],
        ];
    }
}
