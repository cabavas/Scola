<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        return inertia('Dashboard/Index');
    }

    public function users() {
        return inertia('Dashboard/Users/Index');
    }
}
