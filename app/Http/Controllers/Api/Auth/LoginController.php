<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Helpers\JwtAuth;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller {

    public function login(Request $request) {
        $validator = new LoginRequest();
        $jwtAuth = new JwtAuth();
        $input = $request->all();
        $validate = Validator::make($input, $validator->rules());

        if ($validate->fails()) {
            $data = array(
                'status' => 'error',
                'message' => 'El usuario no se ha podido autenticar',
                'errors' => $validate->errors()
            );
        } else {
            if ($request->getToken) {
                $data = $jwtAuth->signup($request, true);
            } else {
                $data = $jwtAuth->signup($request);
            }
        }
        return $data;
    }

    public function update(Request $request) {
        $token = $request->header('Authorization');
        $jwtAuth = new JwtAuth();
        $checkToken = $jwtAuth->checkToken($token);

        if ($checkToken) {
            return "correcto";
        } else {
            return "incorrecto";
        }
    }

}
