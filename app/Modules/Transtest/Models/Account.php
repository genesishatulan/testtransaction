<?php

namespace App\Modules\Transtest\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'username', 'password'
    ];

    public function userinfo()
    {
        return $this->hasOne('App\Modules\Transtest\Models\UserInfo');
    }
}
