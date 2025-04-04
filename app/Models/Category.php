<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'var_categories';
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    protected $fillable = ['category_name', 'category_description', 'category_mandatory', 'users_id']; // เพิ่ม users_id


    public function getMandatoryAttribute()
    {
        return $this->category_mandatory == 1 ? 'บังคับ' : 'ไม่บังคับ';
    }
}
