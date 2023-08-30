<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function logout()
    {
        try {
            Auth::logout(); // Log the user out
            return redirect()->route('login'); // Redirect to the login page
        } catch (Exception $e) {
            Log::error($e);
        }
    }
}
