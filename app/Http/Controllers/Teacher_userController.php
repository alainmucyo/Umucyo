<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Teacher_User;
use App\User;
use Illuminate\Support\Facades\Hash;

class Teacher_userController extends Controller
{

    public function __construct()
    {
            $this->middleware('guest');
    }

    public function index(){
        $teachers=Teacher::get();
        return view("auth.teacher_register",compact("teachers"));
    }
public function create(){
        $this->validate(request(),[
            'name'=>"required|unique:users",
            'email'=>"required|unique:users",
            "password"=>"required|confirmed"
        ]);
        User::create([
            'name'=>request("name"),
            "email"=>request("email"),
            "password"=>Hash::make(request("password")),
            "type"=>0
        ]);
        session()->flash("success","Teacher registered successfully");
        return view("auth.login");
}

}
