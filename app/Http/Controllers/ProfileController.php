<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;




class ProfileController extends Controller
{
    public function showProfile()
    {
        // Get the currently authenticated user
        $user = Auth::user();

        // Pass user data to the view
        return view('profile.showProfile', compact('user'));
    }
}
