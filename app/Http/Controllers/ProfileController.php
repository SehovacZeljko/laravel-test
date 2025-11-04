<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
    public function destroy(Request $request)
    {
        $user = $request->user();

        // Delete avatar file if it exists
        if ($user->avatar && Storage::disk('public')->exists($user->avatar)) {
            Storage::disk('public')->delete($user->avatar);
        }

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('welcome')->with('success', 'Your account has been deleted successfully.');
    }
}
