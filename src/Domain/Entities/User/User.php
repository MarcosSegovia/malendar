<?php


namespace Malendar\Domain\Entities\User;


use Malendar\Domain\Entities\ValueObject\UserId;
use Malendar\Domain\Entities\ValueObject\Email;


class User
{
    private $userId;
    private $name;
    private $email;
    private $password;
    private $hashCode;


    public function __construct(UserId $userId, $name, Email $email, $password = null)
    {
        $this->userId = $userId;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;

        $salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $salt = "$3a$10$" . $salt;
        $this->hashCode = crypt($password, $salt);

    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getHashCode()
    {
        return $this->hashCode;
    }

    public function validate($password)
    {
        return hash_equals($this->hashCode, crypt($password, $this->hashCode));
    }
}