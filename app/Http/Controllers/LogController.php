<?php
/**
 * Created by PhpStorm.
 * User: Korisnik
 * Date: 3/12/2018
 * Time: 9:42 AM
 */

namespace App\Http\Controllers;


use App\Models\UserModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class LogController
{
    public function login(Request $request)
    {
        $userModel = new UserModel();
        $userModel->username = $request->get("username");
        $userModel->password = $request->get("password");
        $user = $userModel->login();
        if ($user) {
            $request->session()->put("user", $user);
           return $user->role == "admin" ? redirect(route("users.index")) : redirect(route("index"));
        }
        else{
            return redirect()->back()->with("warning", "Wrong username or password.");
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|alpha|min:4|max:15',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:5',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{5,}$/'
            ]
        ];

        $messages = [
            "password.regex" => 'Password must contain one uppercase letter and one number.'
        ];

        $validator = \Validator::make($request->all(), $rules, $messages);
        $validator->validate();

        $userModel = new UserModel();
        $userModel->name = $request->get('name');
        $userModel->email = $request->get('email');
        $userModel->username = $request->get('username');
        $userModel->password = $request->get('password');
        $userModel->id_role = 1;

        try {
            $userModel->insert();
            return redirect()->back()->with("success", "Registration successful.");
        } catch(QueryException $e) {
            \Log::error($e -> getMessage());
            return redirect()->back()->with("error", "Server error. Try again later.");
        }

    }

    public function logout()
    {
        session()->forget('user');
        return redirect(route("loginForm"));
    }
}