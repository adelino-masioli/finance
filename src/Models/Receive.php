<?php
/**
 *  Created by PhpStorm.
 *  User: Junior Ferreira
 *  Project: Sistema Financeiro HotMilhas
 */

namespace FinanceHotM\Models;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    protected $fillable = [
        'date_launch',
        'name',
        'value',
        'status',
        'user_id'
    ];
}