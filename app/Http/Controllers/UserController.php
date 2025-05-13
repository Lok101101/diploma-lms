<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function registerUser(RegisterRequest $request) {
        $user = User::create([
            ...$request->validated(),
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);

        return redirect()->route('courses');
    }

    public function loginUser(LoginRequest $request){
        if (Auth::attempt($request->validated())) {
            return redirect()->route('courses');
        }

        return view('user.login', ['loginError' => 'Неправильная почта или пароль, попробуйте ещё раз']);
    }

    public function logoutUser() {
        Auth::logout();

        return redirect()->route('courses');
    }
}
