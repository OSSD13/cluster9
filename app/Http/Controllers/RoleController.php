<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function v()
    {
        return view('homevolunteer');
    }

    public function p()
    {
        return view('homepofficer');
    }

    public function c()
    {
        return view('homecofficer');
    }
}
