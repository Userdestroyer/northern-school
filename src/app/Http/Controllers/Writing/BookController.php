<?php

namespace App\Http\Controllers\Writing;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Show index page
     */
    public function list(): View
    {
        dd('LIST');
        return view('index');
    }

    /**
     * Show index page
     */
    public function book($book): View
    {
        dd($book);
        return view('index');
    }

    /**
     * Show index page
     */
    public function chapter($book, $chapter): View
    {
        dd($book, $chapter);
        return view('index');
    }
}
