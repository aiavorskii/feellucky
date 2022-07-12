<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\UniqueToken;
use Illuminate\Support\Facades\URL;
use App\Services\UniqueTokenService;


class UserController extends Controller
{
    public function store (UserRequest $request) {
        $data = $request->all();
        $user = User::create($data);

        return response()->json([
            'link' => $this->generateLink($user),
        ]);
    }

    public function deactivateActiveLink (Request $request) {
        $tokenID = $request->get('tokenid');
        $token = UniqueToken::find($tokenID);

        $token->update([
            'is_active' => false
        ]);

        return response('Success');
    }

    public function generateNewLink (Request $request, User $user) {
        return response()->json([
            'link' => $this->generateLink($user),
        ]);
    }

    protected function generateLink (User $user) {
        $token = UniqueTokenService::createToken($user);
        return URL::temporarySignedRoute('auth.token.login', now()->addWeek(), ['token' => $token]);
    }

    public function view (Request $request, User $user) {
        $tokenID = session()->get('tokenID');

        return view('user', [
            'userID' => $user->id,
            'tokenID' => $tokenID,
        ]);
    }
}
