<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $payload = $request->all();
        $validator = Validator::make($payload, [
            'name' => 'required',
            'email' => 'required',            
            'password' => 'required'
        ]);

        if($validator->fails()){
            return redirect()->route('register')->with('message',"Fill all the fields");
        }else{
            $result = User::create($payload);
            // dd($result);
            if($result){
                return redirect()->route('login')->with('message','Register Successfully , please login');
            }
        }

    }
}
