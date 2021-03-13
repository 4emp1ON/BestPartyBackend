<?php

namespace App\Http\Controllers;

use App\Mail\DemoEmail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:25',
            'email' => 'required|email:rfc|unique:users|max:191',
            'age' => 'required|numeric|min:21',
            'password' => 'required|min:6'
        ]);

        if ($validator->fails()) {
            $messages = $validator->errors()->all();
            $msg = $messages[0];
            return response()->json(['success_code' => 401, 'response_code' => 0, 'response_message' => $msg]);
        }

        $data = $validator->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        Mail::to($data['email'])->send(new DemoEmail());
        return response('User successfully created', 201);
    }
}
