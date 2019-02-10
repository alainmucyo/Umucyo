<?php

namespace App\Http\Controllers\Auth;

use App\Http\Middleware\TeacherMiddleware;
use App\Teacher;
use App\Teacher_User;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth',TeacherMiddleware::class])->except("teacher", "storeTeacher");
    }


    public function register()
    {
        $type = 1;
        $this->validate(\request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        User::create([
            'name' => \request('name'),
            'email' => \request('email'),
            'type' => $type,
            'password' => Hash::make(\request('password'))
        ]);
        session()->flash("success", "Admin Added Successfully");
        return back();
    }
    public function create()
    {
        $type = 0;
        $this->validate(\request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'name' => \request('name'),
            'email' => \request('email'),
            'type' => $type,
            'password' => Hash::make(\request('password'))
        ]);
        session()->flash("success", "Admin Added Successfully");
        return back();
    }

    public function showRegistrationForm()
{
    $admins = User::where("type",1)->get();
    return view("auth.register", compact("admins"));
}
public function delete($id)
{

    User::find($id)->delete();
    session()->flash("success", "Admin Deleted Successfully");
    return back();
}


}
