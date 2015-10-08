<?php


namespace Malendar\Infrastructure\Persistence;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Malendar\Domain\Entities\Repository\UserRepositoryInterface;
use Malendar\Domain\Entities\ValueObject\UserId;
use Malendar\Domain\Entities\ValueObject\Email;
use Malendar\Domain\Entities\User\User;
use Doctrine\ORM\EntityManager;

class UserCaseRepository extends EntityRepository implements UserRepositoryInterface
{
    private $users;

    public function nextIdentity()
    {
        // TODO: Implement nextIdentity() method.
        return new UserId();

    }

    public function findAll()
    {
        // TODO: Implement findAll() method.
        $query = $this->_em->createQuery('SELECT u FROM Malendar\Domain\Entities\User\User u');
        return $query->getResult();
    }

    public function add(User $user)
    {
        // TODO: Implement add() method.
        $this->_em->persist($user);
        $this->_em->flush();
    }

    public function findByEmail(Email $email)
    {
        // TODO: Implement findByEmail() method.
        $query = $this->_em->createQuery('SELECT u FROM Malendar\Domain\Entities\User\User u WHERE u.email.email = :email');
        $query->setParameter('email', $email->getEmail());
        $user = $query->getResult();
        return $user == null ? false : new User($user[0]->getUserId(), $user[0]->getName(), $user[0]->getEmail(), null, $user[0]->getHashCode());
    }

    public function findByUsername($username)
    {
        // TODO: Implement findByUsername() method.
        $query = $this->_em->createQuery('SELECT u FROM Malendar\Domain\Entities\User\User u WHERE u.name = :namee');
        $query->setParameter('namee', $username);
        $user = $query->getResult();
        return $user == null ? false : new User($user[0]->getUserId(), $user[0]->getName(), $user[0]->getEmail(), null, $user[0]->getHashCode());
    }

    public function update()
    {
        // TODO: Implement update() method.
        $this->_em->flush();
    }

    public function remove(User $user)
    {
        // TODO: Implement remove() method.
        $this->_em->remove($user);
        $this->_em->flush();
    }

}