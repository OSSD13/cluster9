<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    const CREATED_AT = 'activity_create_at';
    const UPDATED_AT = 'activity_update_at';
    
    use HasFactory;

    protected $table = 'var_activities';
    protected $primaryKey = 'activity_id';

    protected $fillable = [
        'activity_name',
        'activity_date',
        'activity_description',
        'activity_status',
        'activity_report_date',
        'activity_permission',
        'categories_id',
        'user_id',
    ];
}
