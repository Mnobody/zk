<?php

namespace App\Migration;

use App\User\Entity\User;
use Yiisoft\Security\Random;
use App\Migration\Migration;
use Yiisoft\Security\PasswordHasher;
use Spiral\Database\Injection\Parameter;

class OrmDefault5fa9f1a57da0b6a4f2cce47f1932440d extends Migration
{
    protected const DATABASE = 'default';

    private PasswordHasher $hasher;

    public function __construct(PasswordHasher $hasher)
    {
        $this->hasher = $hasher;
    }

    public function up()
    {
        $insert = $this->database()->insert('user');

        foreach ($this->data() as $item) {
            $insert->values($item);
        }

        $insert->run();

        $this->fixIdSequence('user');
    }

    public function down()
    {
        $this->database()->table('user')->delete(['id' => ['in' => new Parameter([1, 2, 3])]])->run();
    }

    private function data(): array
    {
        $time = time();
        return [
            [
                'id' => 1,
                'username' => 'user1',
                'email' => 'user1@example.com',
                'status' => User::STATUS_ACTIVE,
                'auth_key' => Random::string(32),
                'password_hash' => $this->hasher->hash('NoweHaslo1@'),
                'password_reset_token' => Random::string() . '_' . time(),
                'verification_token' => Random::string() . '_' . time(),
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id' => 2,
                'username' => 'user2',
                'email' => 'user2@example.com',
                'status' => User::STATUS_ACTIVE,
                'auth_key' => Random::string(32),
                'password_hash' => $this->hasher->hash('NoweHaslo1@'),
                'password_reset_token' => Random::string() . '_' . time(),
                'verification_token' => Random::string() . '_' . time(),
                'created_at' => $time,
                'updated_at' => $time,
            ],
            [
                'id' => 3,
                'username' => 'user3',
                'email' => 'user3@example.com',
                'status' => User::STATUS_ACTIVE,
                'auth_key' => Random::string(32),
                'password_hash' => $this->hasher->hash('NoweHaslo1@'),
                'password_reset_token' => Random::string() . '_' . time(),
                'verification_token' => Random::string() . '_' . time(),
                'created_at' => $time,
                'updated_at' => $time,
            ],
        ];
    }
}
