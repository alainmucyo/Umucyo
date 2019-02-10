<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Lesson;
use App\Level;
use App\Room;
use App\Student;
use App\Teacher;
use App\User;
use App\RoomTeacher;

class AddController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',TeacherMiddleware::class]);
    }

    public function index(){
        $levels=Level::get();
        return view('add.add',compact('levels'));
    }
    public function storeLevel(){
     $this->validate(request(),[
            'name' => 'required|unique:levels'
        ]);

        $level= Level::create([
             'name' =>request('name')
         ]);
        if ($level){
            session()->flash('success','Level Added Successfully');
            return redirect()->back();
        }

        return back();

    }
    public function storeClass(){
        $this->validate(request(),[
            'class' => 'required'
        ]);
        $class= Room::create([
            'class' =>request('class'),
            'level_id' => request('level')
        ]);
        if ($class){
            session()->flash('success','Class Added Successfully');
            return redirect()->back();
        }

        return back();
    }
    public function student($name){
      $classes=Level::find($name);

        $class= $classes->rooms;
        $classes= $class;
        return view('ajax.select',compact('classes'));


    }
    public function storeStudent(){
        $this->validate(\request(),[
           'fname' =>'required',
            'contact' => 'required|unique:students',
            'address' => 'required',
            'class' => 'required',
            'gender'=>'required|bool'
        ]);
        $student=Student::create([
            'fname' => \request('fname'),
            'room_id' => \request('class'),
            'gender'=>request("gender"),
            'mother' => \request('mother'),
            'father' => \request('father'),
            'contact' => \request('contact'),
            'address' => \request('address'),
            'level_id'=>request("level"),
            'payment'=>0
        ]);
        if ($student){
            session()->flash('success','Student Added Successfully');
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }
    public function teacher(){
        $teachers=Teacher::get();
        $i=1;
        return view("add.addTeacher",compact("teachers","i"));
    }
    public function storeTeacher(){
        $this->validate(request(),[
            "name"=>"required",
            "degree"=>"required",
            "contact"=>"required"
        ]);
        Teacher::create([
            'name'=>request("name"),
            'degree'=>request("degree"),
            'gender'=>request("gender"),
            'contact'=>request("contact")
        ]);
        session()->flash("success","Teacher Added Successfully");
        return back();
    }
    public function delTeacher($id){
        Teacher::find($id)->delete();
        session()->flash("success","Teacher deleted successfully");
        return back();
    }
public function lesson(){
        $teachers=Teacher::get();
        $levels=Level::get();
        return view("add.lesson",compact("levels","teachers"));
}

public function storeLesson(){
    $this->validate(request(),[
        'class'=>"required",
        'name'=>'required',
        'hours'=>'required'
    ]);
    if (request("teacher")==0) {
        Lesson::create([
            'name' => request("name"),
            "hours" => request("hours"),
            "room_id" => request("class")
        ]);
    }
    else{
        Lesson::create([
            'name' => request("name"),
            "hours" => request("hours"),
            "room_id" => request("class"),
            "teacher_id"=>request("teacher")
        ]);
        if (RoomTeacher::where("room_id",request("class"))->where("teacher_id",request("teacher"))->count() ==0) {
      
         RoomTeacher::create([
                'room_id' => \request("class"),
                'teacher_id' => \request("teacher"),
            ]);
     }
    }
    session()->flash("success","Lesson Added Successfully");
    return back();
}
public function table()
{
     $i=1;
  $teachers=Teacher::get();
    if (\request("p") == "view") {
            foreach ($teachers as $teacher) {
                $gender=$teacher->gender ? "Male":"Female";
                echo "<tr>" .
                    "<td>" . $teacher->id . "</td>" .
                    "<td>" . $i++ . "</td>" .
                    "<td>" . $teacher->name . "</td>" .
                    "<td>" . $gender. "</td>" .
                    "<td>" . $teacher->degree . "</td>" .
                    "<td>" . $teacher->contact . "</td>" .
                    "</tr>";
            }
            

        }
        else{

            if (\request("action")=="edit"){
                $name=Teacher::find(request("id"))->name;
                User::where("name",$name)->first()->update(['name'=>request("name")]);
               
                Teacher::find(\request("id"))->update([
                    "name"=>\request("name"),
                    "degree"=>\request("degree"),
                    "gender"=>request("gender"),
                    "contact"=>\request("contact")
                ]);
                


            }
            else if (\request("action")==="delete"){
                Teacher::find(\request("id"))->delete();
            }

        }  
}
}
