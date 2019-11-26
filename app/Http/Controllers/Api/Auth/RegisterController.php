<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use App\Card;
use App\User;

class RegisterController extends Controller
{
    public function register(Request $request){
        $input = $request->all();
        $input = array_map('trim', $input);
        $validator = new RegisterRequest();
        $validate = Validator::make($input, $validator->rules());
        if($validate->fails()){
            $data = array(
                'status' => 'error',
                'message' => 'El usuario no se ha creado',
                'errors' => $validate->errors()
            );
        }else{
            $user = User::create([
                'name' => $input['name'], 
                'surname' => $input['surname'], 
                'role_id' => 2, 
                'cedula' => $input['cedula'],
                'phone' => $input['phone'],  
                'address' => $input['address'], 
                'email' => $input['email'], 
                'password' => Hash::make($input['password']),
            ]);
            $card = Card::create([
                'user_id' => $user->id,
                'card' => $input['card']
            ]);
            $data = array(
                'status' => 'success',
                'message' => 'El usuario se ha creado',
                'user' => $user
            );
        }
        return $data;
    }
}
