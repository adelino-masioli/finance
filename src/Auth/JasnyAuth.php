<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

namespace FinanceHotM\Auth;

use Jasny\Auth\Sessions;
use Jasny\Auth\User;
use FinanceHotM\Repository\RepositoryInterface;

class JasnyAuth extends \Jasny\Auth
{
    use Sessions;
    private $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function fetchUserById($id)
    {
        return $this->repository->find($id, false);
    }

    public function fetchUserByUsername($username)
    {
        $result = $this->repository->findByField('email', $username);
        return count($result)? $result[0] : null;
        //return $this->repository->findByField('email', $username)[0];
    }

    public function verifyCredentials($user, $password)
    {
        return isset($user) && password_verify($password, $user->getHashedPassword());
    }
}