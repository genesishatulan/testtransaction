<?php

namespace App\Modules\Transtest\Models;

use App\Modules\Transtest\Models\Account;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'fname', 'mname', 'lname', 'account_id'
    ];
    public function account()
    {
        return $this->belongsTo('App\Modules\Transtest\Models\Account');
    }
}
