<?php

namespace App\Http\Controllers;

use App\AuthToken;
use App\Events\TokenRequested;
use App\Http\Requests\IssueToken;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('backend.login');
    }

    public function issueToken(IssueToken $request)
    {
        if ($request->validated()) {
            $email = $request->email;

            $authToken = AuthToken::firstOrNew(['email' => $email])->setToken();
            $authToken->save();

            event(new TokenRequested($authToken));

            return 'success';
        }
        // Find an existing token for the email
        // if a token exists update it otherwise create a new one
        // send the token via email
    }

    public function authenticate($token)
    {
        // if a token exists, authenticate the user and delete the token
        // otherwise deny login
        $token = AuthToken::where('token', $token)->first();
        if ($token) {
            $user = User::where('email', $token->email)->first();
            if ($user) {
                Auth::login($user);
            } else {
                $user = factory(User::class)->create([
                    'email' => $token->email,
                    'name' => '',
                    'role' => 'transporter',
                ]);
            }
            if ($user->role != 'admin' && $user->organization_id === null) {
                
                return redirect('/transporter/register-company');
            }

            return redirect("/{$user->role}/dashboard");
        }

        return abort(401);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
