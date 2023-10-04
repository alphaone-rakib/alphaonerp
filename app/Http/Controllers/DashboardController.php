<?php

namespace App\Http\Controllers;

use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "Welcome to alphaoneerp";
        return view('dashboard', compact('title'));
    }
}
