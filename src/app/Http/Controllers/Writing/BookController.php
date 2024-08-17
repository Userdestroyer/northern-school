<?php

namespace App\Http\Controllers\Writing;

use App\Http\Controllers\Controller;
use App\Models\Writing\Books\Book;
use App\Models\Writing\Books\BookLocalization;
use App\Models\Writing\Books\Chapter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Show index page
     */
    public function list(): View
    {
        return view('books.list');
    }

    /**
     * Show index page
     */
    public function book(BookLocalization $bookLocalization): View
    {
        return view('books.book-localization', ['bookLocalization' => $bookLocalization]);
    }

    /**
     * Show index page
     */
    public function chapter(BookLocalization $bookLocalization, $chapter): View
    {
        $chapter = $bookLocalization->chapters()->where('number', $chapter)->firstOrFail();
        return view('books.chapter', ['chapter' => $chapter]);
    }
}
