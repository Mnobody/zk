<?php

namespace App\Migration;

use Spiral\Migrations\Migration;

class OrmDefaultCea2f3ea784966b0eb7afd158744e570 extends Migration
{
    protected const DATABASE = 'default';

    public function up()
    {
        $schema = $this->table('user')->getSchema();

        $schema->bigPrimary('id');
        $schema->string('username')->nullable(false);
        $schema->string('email')->nullable(false);
        $schema->string('auth_key', 32)->nullable(false);
        $schema->string('password_hash')->nullable(false);
        $schema->string('password_reset_token');
        $schema->string('verification_token')->defaultValue(null);
        $schema->integer('created_at')->nullable(false);
        $schema->integer('updated_at')->nullable(false);

        $schema->index(['password_reset_token'])->unique(true);
        $schema->index(['email'])->unique(true);

        $schema->save();
    }

    public function down()
    {
        $this->table('user')->drop();
    }
}
