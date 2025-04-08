<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'var_activities';
    protected $primaryKey = 'activity_id';
    public $timestamps = false;

    protected $fillable = [
        'activity_name',
        'activity_date',
        'activity_description',
        'activity_status',
        'activity_report_date',
        'activity_permission',
        'activity_create_at',
        'activity_update_at',
        'activity_year',
        'categories_id',
        'users_id',
    ];
}
