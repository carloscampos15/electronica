<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class JwtAuth {

    private $key;

    public function __construct() {
        $this->key = 'key';
    }

    public function signup(Request $request, $getToken = null) {
        $input = $request->all();
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            $data = array(
                'status' => 'error',
                'message' => 'Las credenciales no coinciden con nuestros registros.'
            );
        } else {
            $user = User::where('email', $input['email'])->first();
            $token = array(
                'user' => $user,
                'iat' => time(),
                'exp' => time() + (7 * 24 * 60 * 60)
            );
            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);
            if (is_null($getToken)) {
                $data = $jwt;
            } else {
                $data = json_encode($decoded);
            }
        }
        return $data;
    }

    public function checkToken($jwt, $getIdentify = false) {
        $auth = false;
        try {
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);
            if (!empty($decoded) && is_object($decoded) && isset($decoded->user->id)) {
                $auth = true;
            }
        } catch (\UnexpectedValueException $e) {
        } catch (\DomainException $e) {
        }

        if ($getIdentify) {
            return $decoded;
        }
        return $auth;
    }

}
