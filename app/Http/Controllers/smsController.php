<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Message;
use App\Student;
use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class smsController extends Controller
{
  

    public function index()
    {
        $messages=Message::where("student_id",0)->paginate(3);
        return view('message.sms',compact("messages"));
    }

    public function send($id)
    {
        $this->validate(\request(), [
            'title' => 'required',
            'content' => 'required'
        ]);
        Message::create([
            "title" => request("title"),
            "body" => request("content"),
            "student_id" => $id
        ]);
        session()->flash('success', 'Message Sent Successfully');
        return back();
        
    }

    public function parent($id)
    {
        $student = Student::find($id);
        return view("message.parent", compact("student"));
    }
    public function delete($id){
        Message::find($id)->delete();
        session()->flash("success","Message Deleted Successfully");
        return back();
    }
}
