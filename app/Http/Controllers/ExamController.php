<?php

namespace App\Http\Controllers;

use App\Charts\ExamChart;
use App\Exam;
use App\Room;
use App\Student;
use App\Teacher;
use App\Total;
use Illuminate\Support\Facades\Auth;

class examController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $i = 1;
        $user = Auth::user()->name;
        $rooms = Teacher::where("name", Auth::user()->name)->first()->rooms;
        $exames = Teacher::where("name", $user)->first()->exames->sortByDesc("created_by");
        $chart = new ExamChart();
        return view("teachers.exam", compact("exames", "i", "rooms", "chart"));
    }

    public function store()
    {
        $teacher = Teacher::where("name", Auth::user()->name)->first()->id;
        $this->validate(\request(), [
            'name' => "required",
            'marks' => 'required|numeric'
        ]);

        $exam = Exam::create([
            'name' => \request('name'),
            'marks' => \request("marks"),
            'teacher_id' => $teacher,
            'lesson_id' => \request("lesson"),
            'room_id' => \request("room")
        ]);
        $exam_id = $exam->id;
        $students = Exam::find($exam_id)->room->students;
        // $lesson = Exam::find($exam_id)->id;
        foreach ($students as $student) {
            Total::create([
                'exam_id' => $exam_id,
                'student_id' => $student->id,
                'lesson_id' => \request("lesson"),
                'total' => \request("marks"),
                'marks' => null
            ]);

        }
        session()->flash("success", "exam added successfully");
        return back();
    }

    public function thisExam($id)
    {
        $exam = Exam::find($id);
        $students = $exam->room->students->sortBy("fname");
        $i = 1;
        return view("teachers.thisExam", compact("exam", "students", "i"));
    }

    public function lesson($id)
    {

        $lessons = Teacher::where("name", Auth::user()->name)->first()->lessons->where("room_id", $id);
        return view("ajax.lesson", compact("lessons"));
    }

    public function delete($id)
    {
        Exam::find($id)->delete();
        Total::where("exam_id", $id)->delete();
        session()->flash("success", "exam deleted successfully");
        return back();
    }

    public function update($marks, $std_id, $exam_id)
    {
        $total = Exam::find($exam_id)->marks;
        $lesson = Exam::find($exam_id)->lesson->id;
        /*  if (Total::where("lesson_id", $lesson)
                 ->where("student_id", $std_id)
                 ->pluck("total")->sum() != 0) {
            $total_marks = round(100 * Mark::where("lesson_id", $lesson)
                     ->where("student_id", $std_id)
                     ->pluck("marks")->sum() / Mark::where("lesson_id", $lesson)
                     ->where("student_id", $std_id)
                     ->pluck("total")->sum(), 2);
             Total::where("student_id",$std_id)->where("lesson_id",$lesson)->update(["exam"=>$total_marks]);

        }*/
        if ($marks > $total) {
            return "error";
        }
             if (Total::where("student_id", $std_id)->where("exam_id", $exam_id)->count()==0) {
            Total::create([
                "exam_id"=>$exam_id,
                "student_id"=>$std_id,
                "lesson_id"=>Exam::find($exam_id)->lesson->id,
                "total"=>$total,
                "marks"=>$marks
            ]);
        }
        Total::where("student_id", $std_id)->where("exam_id", $exam_id)->update([
            'marks' => $marks
        ]);

        return $marks . " Marks Successfully Assigned To " . Student::find($std_id)->fname;

    }
}
