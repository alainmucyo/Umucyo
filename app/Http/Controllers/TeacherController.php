<?php

namespace App\Http\Controllers;

use App\Charts\TeacherChart;
use App\Lesson;
use App\Mark;
use App\Room;
use App\Teacher;
use App\Student;

use PDF;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    function __construct()
    {
         $this->middleware("auth");
    }

    public function index()
    {

        $chart = new TeacherChart();
        return view("teachers.home", compact("chart"));
    }

    public function students($id)
    {

        $i = 1;
        $lesson = Lesson::find($id);
        $students = $lesson->room->students->sortBy("fname");
        return view("teachers.index", compact("students", "lesson", "i"));
    }

    public function report($id)
    {
        $room=Student::find($id)->room->id;
        $students = Room::find($room)->students->sortByDesc("marks_total");
        $a=0;
        $b=0;
        foreach ($students as $student) {
          $a++;
          if ($student->id == $id) {
              $b=$a;
              break;
          }

        }

        $lessons = Student::find($id)->room->lessons;
        $student_name=Student::find($id)->fname;
        $sum_quiz = 0;
        $sum_exam = 0;
        $i=1;
        $sum_total = 0;
       $pdf = PDF::loadView("students.report", compact("sum_quiz", "sum_exam", "sum_total", "lessons", "id","b","students"))->setPaper('a4');
       

        return $pdf->download($student_name." report.pdf");
      // return view("students.report", compact("sum_quiz", "sum_exam", "sum_total", "lessons", "id","b","students"));

    }

    public function reports($id)
    {

        $students = Room::find($id)->students;
        foreach ($students as $student) {
            $sum_quiz = 0;
            $sum_exam = 0;
            $sum_total = 0;
            foreach ($student->room->lessons as $lesson) {
                $total = $lesson->marks->where("student_id", $student->id)->pluck("total")->sum();
                $totals = $lesson->totals->where("student_id", $student->id)->pluck("total")->sum();

                $marks = 0;
                $exam = 0;
                if ($total == 0) {
                    $marks = 0;
                } else {
                    $marks = $lesson->hours * 10 * $lesson->marks->where("student_id", $student->id)->pluck("marks")->sum() / $total;
                    $sum_quiz += $marks;
                }
                if ($totals == 0) {
                    $exam = 0;
                } else {
                    $exam = $lesson->hours * 10 * $lesson->totals->where("student_id", $student->id)->pluck("marks")->sum() / $totals;
                    $sum_exam += $exam;
                }

            }
            Student::find($student->id)->update(['marks_total' => $sum_quiz + $sum_exam]);
        }
        $students = Room::find($id)->students->sortByDesc("marks_total");
        $i = 1;
        $room_name=Room::find($id)->class;
         $pdf = PDF::loadView("students.reports", compact("i","students"));
        return $pdf->download($room_name." Reports.pdf");
    }


    public function test($id)
    {
        $i=1;
        $pdf = PDF::loadView("test", compact("i"));
        return $pdf->download("test.pdf");
    }

}
