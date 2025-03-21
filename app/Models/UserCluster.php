<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class UserCluster extends Model implements Authenticatable
{
    use AuthenticatableTrait;

    protected $table = 'var_users';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    protected $hidden = ['user_password'];
    protected $fillable = [
        'user_id',
        'user_name',
        'user_password',
        'user_fname',
        'user_lname',
        'user_role',
        'user_province'
    ];
}
