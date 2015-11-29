<?php


namespace Malendar\Infrastructure\Factory;


use Malendar\Domain\Entities\User\User;
use Malendar\Domain\Entities\User\UserFactoryInterface;

class UserFactory implements UserFactoryInterface
{

    public static function create($uuid, $name, $email, $admin = false, $password = null, $hashCode = null)
    {
        return new User($uuid, $name, $email, $admin, $password, $hashCode);
    }
}