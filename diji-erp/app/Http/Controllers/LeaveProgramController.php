<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeaveProgramController extends Controller
{
    public function index()
    {
        return view('human-resources.leave-program.index');
    }
}
