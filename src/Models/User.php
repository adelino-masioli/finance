<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

declare(strict_types=1);
namespace FinanceHotM\Models;

use Illuminate\Database\Eloquent\Model;
use Jasny\Auth\User as JasnyUser;

class User extends Model implements JasnyUser, UserInterface
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password'
    ];

    public function getId():int
    {
        return (int)$this->id;
    }

    public function getUsername():string
    {
        return $this->email;
    }

    public function getHashedPassword():string
    {
        return $this->password;
    }

    public function onLogin()
    {
        // TODO
    }

    public function onLogout()
    {
        // TODO
    }

    public function getFullname(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}