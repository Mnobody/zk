<?php

declare(strict_types=1);

namespace App\User\Entity;

use Yiisoft\Auth\IdentityInterface;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

/**
 * @Entity(repository = "App\User\Repository\UserRepository")
 */
class User implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const STATUS_BANNED = 21;

    /**
     * @Column(type = "bigPrimary")
     */
    protected ?int $id = null;

    /** @Column(type = "string") */
    protected string $username;

    /** @Column(type = "string") */
    protected string $email;

    /** @Column(type = "tinyInteger") */
    protected int $status;

    /** @Column(type = "string(32)") */
    protected string $auth_key;

    /** @Column(type = "string") */
    protected string $verification_token;

    /** @Column(type = "string") */
    protected string $password_hash;

    /** @Column(type = "string") */
    protected string $password_reset_token;

    /** @Column(type = "integer") */
    protected int $created_at;

    /** @Column(type = "integer") */
    protected int $updated_at;

    public function getId(): string
    {
        return (string) $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $name): void
    {
        $this->username = $name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    public function setAuthKey(string $key): void
    {
        $this->auth_key = $key;
    }

    public function getVerificationToken(): string
    {
        return $this->verification_token;
    }

    public function setVerificationToken(string $token): void
    {
        $this->verification_token = $token;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(string $hash):void
    {
        $this->password_hash = $hash;
    }

    public function getPasswordResetToken(): string
    {
        return $this->password_reset_token;
    }

    public function setPasswordResetToken(string $token): void
    {
        $this->password_reset_token = $token;
    }

    public function setCreatedAt(int $created_at): void
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): int
    {
        return $this->created_at;
    }

    public function setUpdatedAt(int $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): int
    {
        return $this->updated_at;
    }
}
