<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

namespace FinanceHotM\Models;


interface UserInterface
{
    public function getId():int;
    public function getFullname():string;
    public function getEmail():string;
    public function getPassword():string;
}