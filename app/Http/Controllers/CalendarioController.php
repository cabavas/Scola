<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendarioController extends Controller
{
    public function index() {
        return inertia('Calendario/Index');
    }
}
