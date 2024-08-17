<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Show index page
     */
    public function index(): View
    {
        return view('index');
    }
}
