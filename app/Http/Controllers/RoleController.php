<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function v()
    {
        $categories = Category::all();
        return view('layout.layoutvolunteer', compact('categories'));
    }

    public function p()
    {
        $categories = Category::all();
        return view('layout.layoutprovince', compact('categories'));
    }

    public function c()
    {
        $categories = Category::all();
        return view('layout.layoutcentral', compact('categories'));
    }
}
