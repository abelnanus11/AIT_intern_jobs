<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function register(){

        return view("users.register");

    }

      public function store(Request $request){
        $formFields =$request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required|confirmed|min:6",
        ]);



         //hash password

         $formFields["password"] = bcrypt($formFields["password"]);

         //create user

         $user = User::create($formFields);

         //login

         auth()->login($user);

         return redirect("/")->with("message", "User Created successfully and Logged in");


      }

        //logout 
        public function logout(Request $request){
            auth()->logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect("/")->with("message", "you have logged out!");
        }

         //showing login fom
        public function login(){
            return view("users.login");
        }


        // authenticate user
        public function authenticate(Request $request) {
            $formFields =$request->validate([
               
                "email" => ["required", "email"],
                "password" => "required"
            ]);
            if(auth()->attempt($formFields)){
                $request->session()->regenerate();

                return redirect("/")->with("message", "Welcome back you have logged in!");
                
            }

            return back()->withErrors(["email" => "InvalidCredentials"])->onlyInput("email");

        }

       
}


