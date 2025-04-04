<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function v()
    {
        $categories = Category::all();
        return view('homevolunteer', compact('categories'));
    }

    public function p()
    {
        $categories = Category::all();
        return view('homepofficer', compact('categories'));
    }

    public function c()
    {
        $categories = Category::all();
        return view('homecofficer', compact('categories'));
    }
}
