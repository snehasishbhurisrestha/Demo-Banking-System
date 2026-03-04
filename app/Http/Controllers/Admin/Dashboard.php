<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Auth;

class Dashboard extends Controller
{
    public function index()
    {
        return view('dashboard');
    }
}