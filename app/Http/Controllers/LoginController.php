<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function login( Request $request )
    {
        $user           = User::where( 'email', $request->email )->first();
        if ( !$user ) {
            return response()->json( [
                'Username or password is invalid'
            ], 400 );
        }

        if ( !Hash::check( $request->password, $user->password ) ) {
            return response()->json( [
                'Username or password is invalid'
            ], 400 );
        }

        $token          = $user->createToken('Token Name')->accessToken;
        $user->token    = $token;

        return response()->json( $user, 200 );
    }
}
