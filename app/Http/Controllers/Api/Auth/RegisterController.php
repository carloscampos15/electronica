<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use App\Card;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
