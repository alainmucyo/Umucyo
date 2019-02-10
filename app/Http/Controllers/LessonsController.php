<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Lesson;
use App\Level;
use App\Room;
use App\RoomTeacher;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LessonsController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', TeacherMiddleware::class]);
    }

    public function index()
    {
        if (\request("room_id")) {
            $room = Room::find(\request("room_id"));
            $lessons = $room->lessons;
        } else {

            $room = Room::first();
            $lessons = $room->lessons;
        }
        $levels = Level::get();
        return view("lessons.lessons", compact("room", "levels", "lessons"));
    }

    public function room($id)
    {
        $rooms = Level::find($id)->rooms;
        return view("ajax.lessons_class", compact("rooms"));
    }

    public function lesson($id)
    {

        $lesson = Lesson::find($id);
        $teachers = Teacher::get();
        return view("lessons.lesson", compact("teachers", "lesson"));
    }

    public function update($id)
    {
        if (\request("teacher") == 0) {
            RoomTeacher::where("room_id", \request("room_id"))->where("teacher_id", \request("teacher_id"))->delete();
            Lesson::find($id)->update([
                'teacher_id' => null
            ]);
        } else {
            Lesson::find($id)->update([
                'teacher_id' => \request("teacher")
            ]);
             if (RoomTeacher::where("room_id",request("room_id"))->where("teacher_id",request("teacher"))->count() ==0) {
            RoomTeacher::create([
                'room_id' => \request("room_id"),
                'teacher_id' => \request("teacher"),
            ]);
        }
        }
        \session()->flash("success", "Teacher Assigned Successfully To");
        return back();
    }

    public function students($id)
    {
        $students = Lesson::find($id)->room->students->sortBy("fname");
        $lesson = $id;
        $i = 1;
        return view("lessons.student", compact("students", "i", "lesson"));
    }

    public function exam($id)
    {
        $students = Lesson::find($id)->room->students->sortBy("fname");
        $lesson = $id;
        $i = 1;
        return view("lessons.exams", compact("students", "i", "lesson"));
    }

    public function table($id)
    {
        $i = 1;
        $lesson = Lesson::find($id);
        $this_class_teachers = $lesson->room->teachers;
       // $teachers=array();
        $teachers=Teacher::get();
        if (\request("p") == "view") {
            foreach ($teachers as $teacher) {
                 if (Lesson::where("teacher_id",$teacher->id)->where("room_id",$lesson->room->id)->count() !=0) {
                   echo "<tr>" .
                    "<td>" . $teacher->id . "</td>" .
                    "<td>" . $i++ . "</td>" .
                    "<td>" . $teacher->name . "</td>" .
                    "<td>" . $teacher->degree . "</td>" .
                    "<td>" . $teacher->contact . "</td>" .
                    "</tr>";
                }
            }
          /*  foreach ($this_class_teachers as $teacher) {
                if (Lesson::where("teacher_id",$teacher->id)->where("room_id",$lesson->room->id)->count() !=0) {
                   echo $teacher->name;
                }
            }
           /* foreach ($this_class_teachers as $teacher->where()) {
                echo "<tr>" .
                    "<td>" . $teacher->id . "</td>" .
                    "<td>" . $i++ . "</td>" .
                    "<td>" . $teacher->name . "</td>" .
                    "<td>" . $teacher->degree . "</td>" .
                    "<td>" . $teacher->contact . "</td>" .
                    "</tr>";

            } */

      }
        else{

            if (\request("action")=="edit"){
                Teacher::find(\request("id"))->update([
                    "name"=>\request("name"),
                    "degree"=>\request("degree"),
                    "contact"=>\request("contact")
                ]);

            }
            else if (\request("action")==="delete"){
                Teacher::find(\request("id"))->delete();
            }

        }
    }
}
