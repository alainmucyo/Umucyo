<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Lesson;
use App\Level;
use App\Period;
use App\Quiz;
use App\Room;
use App\Mark;
use App\Total;
use App\Exam;
use App\Student;
use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', TeacherMiddleware::class]);
    }

    public function index()
    {

        if (Period::get()->count()==0){
            Period::create(["year"=>date("Y"),"term"=>1]);
        }

        $levels = Level::get();
        $rooms = Room::get();
        $teachers = Teacher::get();
        $lessons = Lesson::get();
        $admins = User::where("type", 1)->get();
        $students = Student::get();
        $period = Period::first();
        return view('home', compact("levels", "rooms", 'teachers', 'lessons', 'admins', 'students', 'period'));
    }

    public function table($name)
    {
        $students = Student::get()->sortBy("fname");
        $i = 1;
        switch ($name) {
            case "levels":
                return view("table.levels");
                break;
            case 'rooms':
                return view("table.rooms");
                break;
            case 'students':
                return view("table.students", compact("students", "i"));
                break;
            case 'lessons':
                return view("table.lessons");
                break;
            default :
                return $name;
        }

    }

    public function edit($name)
    {
        $i = 1;
        $levels = Level::get();
        $rooms = Room::get();
        $lessons = Lesson::get();
        if ($name == "levels") {
            if (request("p") == "view") {
                foreach ($levels as $level) {
                    echo "<tr>" .
                        "<td>" . $level->id . "</td>" .
                        "<td>" . $i++ . ".</td>" .
                        "<td>" . $level->name . "</td>" .
                        "<td>" . $level->rooms->count() . "</td>" .
                        "<td>" . $level->students->count() . "</td>" .
                        "</tr>";
                }
            }
            if (\request("action") == "edit") {
                Level::find(\request("id"))->update([
                    "name" => \request("name"),
                ]);


            } else if (\request("action") === "delete") {
                Level::find(\request("id"))->delete();
                Room::where("level_id", \request("id"))->delete();
                foreach (Level::find(\request("id"))->rooms as $room) {
                    Student::where("room_id", $room->id)->delete();
                    Room::find($room->id)->delete();
                    Quiz::where("room_id", $room->id)->delete();
                }
            }
        } else if ($name == "rooms") {
            if (request("p") == "view") {
                foreach ($rooms as $level) {
                    echo "<tr>" .
                        "<td>" . $level->id . "</td>" .
                        "<td>" . $i++ . "</td>" .
                        "<td>" . $level->class . "</td>" .
                        "<td>" . $level->students->count() . "</td>" .
                        "<td>" . $level->level->name . "</td>" .
                        "<td> <a href='reports/$level->id' class='btn btn-info btn-sm btn-raised'>Generate</a></td>" .
                        "</tr>";
                }
            }
            if (\request("action") == "edit") {
                Room::find(\request("id"))->update([
                    "class" => \request("name"),
                ]);


            } else if (\request("action") === "delete") {
                Room::find(\request("id"))->delete();
                Student::where("room_id", \request("id"))->delete();
                Quiz::where("room_id", \request("id"))->delete();
            }
        } else if ($name == "lessons") {
            if (request("p") == "view") {
                $test = null;

                foreach ($lessons as $level) {

                    if ($level->teacher != null) {
                        echo "<tr>" .
                            "<td>" . $level->id . "</td>" .
                            "<td>" . $i++ . "</td>" .
                            "<td>" . $level->name . "</td>" .
                            "<td>" . $level->hours . "</td>" .
                            "<td>" . $level->teacher->name . "</td>" .
                            "<td>" . $level->room->class . "</td>" .
                            "</tr>";
                    } else {
                        echo "<tr>" .
                            "<td>" . $level->id . "</td>" .
                            "<td>" . $i++ . "</td>" .
                            "<td>" . $level->name . "</td>" .
                            "<td>" . $level->hours . "</td>" .
                            "<td>" . "No Teacher Available" . "</td>" .
                            "<td>" . $level->room->class . "</td>" .
                            "</tr>";
                    }
                }
            }
            if (\request("action") == "edit") {
                Lesson::find(\request("id"))->update([
                    "name" => \request("name"),
                    "hours" => request("hours")
                ]);
            } else if (\request("action") === "delete") {
                Lesson::find(\request("id"))->delete();
                Mark::where("lesson_id", \request("id"))->delete();
                Quiz::where("lesson_id", \request("id"))->delete();
                Total::where("lesson_id", \request("id"))->delete();
                Exam::where("lesson_id", \request("id"))->delete();
            }
        }

    }
}
