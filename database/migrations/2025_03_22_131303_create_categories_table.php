<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        // สร้างตาราง var_users
        Schema::create('var_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->primary(); // ใช้ unsignedBigInteger และ primary key
            $table->string('user_name', 45);
            $table->string('user_password', 45);
            $table->enum('user_role', ['C', 'P', 'V']);
            $table->string('user_nameth', 100);
            $table->string('user_province', 45);
        });

        // สร้างตาราง var_categories
        Schema::create('var_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->primary()->autoIncrement(); // ใช้ unsignedBigInteger และ primary key
            $table->string('category_name', 45);
            $table->string('category_description', 255);
            $table->datetime('category_create_at')->nullable();
            $table->enum('category_mandatory', ['0', '1']);
            $table->unsignedBigInteger('users_id'); // เพิ่ม users_id
            $table->foreign('users_id')->references('user_id')->on('var_users')->onDelete('cascade'); // foreign key ไปยัง var_users
        });

        // สร้างตาราง var_activities
        Schema::create('var_activities', function (Blueprint $table) {
            $table->unsignedBigInteger('activity_id')->primary(); // ใช้ unsignedBigInteger และ primary key
            $table->string('activity_name', 45);
            $table->date('activity_date');
            $table->mediumText('activity_description');
            $table->string('activity_status', 45);
            $table->string('activity_report_date');
            $table->enum('activity_permission', ['P', 'V', 'C']);
            $table->datetime('activity_create_at');
            $table->datetime('activity_update_at');
            $table->string('activity_year', 45);
            $table->unsignedBigInteger('categories_id'); // foreign key ไปยัง var_categories
            $table->unsignedBigInteger('users_id'); // foreign key ไปยัง var_users
            $table->foreign('categories_id')->references('category_id')->on('var_categories')->onDelete('cascade');
            $table->foreign('users_id')->references('user_id')->on('var_users')->onDelete('cascade');
        });

        // สร้างตาราง var_image
        Schema::create('var_image', function (Blueprint $table) {
            $table->increments('image_id');
            $table->string('image_path', 255);
            $table->unsignedBigInteger('activities_id'); // ใช้ unsignedBigInteger ให้ตรงกับ activity_id
            $table->foreign('activities_id')->references('activity_id')->on('var_activities')->onDelete('cascade');
        });

        // สร้างตาราง var_approvals
        Schema::create('var_approvals', function (Blueprint $table) {
            $table->increments('approval_id'); // ไม่ต้องใช้ primary() เพราะ increments() ทำหน้าที่เป็น primary key อยู่แล้ว
            $table->string('approval_status', 45);
            $table->date('approval_date');
            $table->unsignedBigInteger('activities_id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('activities_id')->references('activity_id')->on('var_activities')->onDelete('cascade');
            $table->foreign('users_id')->references('user_id')->on('var_users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('var_approvals');
        Schema::dropIfExists('var_image');
        Schema::dropIfExists('var_activities');
        Schema::dropIfExists('var_categories');
        Schema::dropIfExists('var_users');
    }
}
