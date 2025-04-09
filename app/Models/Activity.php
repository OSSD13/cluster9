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
        'categories_id',
        'users_id',
    ];

    /**
     * Get the category that owns the activity.
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'category_id');
    }
}
