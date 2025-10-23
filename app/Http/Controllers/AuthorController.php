<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of authors with their books (One-to-Many relationship).
     */
    public function index()
    {
        // Eager load books to avoid N+1 query problem
        $authors = Author::with('books')->get();

        return view('authors.index', compact('authors'));
    }
}
