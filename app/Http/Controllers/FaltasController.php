<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaltasController extends Controller
{
    public function index() {
        return inertia('Faltas/Index');
    }
}
