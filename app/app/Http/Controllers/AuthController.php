<?php

namespace App\Http\Controllers;

use App\Models\UniqueToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function linkTokenLogin(Request $request) {
        $token = $request->route()->parameter('token');
        $tokenEntry = UniqueToken::where('token', $token)->where('is_active', true)->first();

        Auth::login($tokenEntry->user);

        // add entry for next session to make link accessible only throug token link
        session()->flash('tokenAccess', true);
        session()->flash('tokenID', $tokenEntry->id);
        return redirect(route('user.view', ['user' => $tokenEntry->user]));
    }
}
