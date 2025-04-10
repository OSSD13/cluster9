<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $table = 'var_approvals';
    protected $primaryKey = 'approval_id';
    protected $fillable = [
        'approval_status',
        'approval_date',
        'activities_id',
        'users_id'
    ];
}
