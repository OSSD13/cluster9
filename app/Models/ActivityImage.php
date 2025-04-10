<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityImage extends Model
{
    use HasFactory;

    protected $table = 'var_image';
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'image_path',
        'activities_id'
    ];
}