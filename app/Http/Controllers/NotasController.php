<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotasController extends Controller
{
    public function index() {
        return inertia('Notas/Index');
    }
}
