<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    /**
     * Exibe o dashboard administrativo.
     */
    public function index()
    {
        return Inertia::render('dashboard');
    }
} 