<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCluster extends Model
{
    protected $table = 'var_users'; // ชื่อตารางที่ถูกต้อง
    protected $primaryKey = 'user_id'; // Primary Key ของตาราง

    public $timestamps = false; // ปิดการใช้งาน created_at และ updated_at

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
