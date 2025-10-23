<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of users with their profiles (One-to-One relationship).
     */
    public function index()
    {
        // Eager load profiles to avoid N+1 query problem
        $users = User::with('profile')->get();

        return view('users.index', compact('users'));
    }
}
