<?php

namespace App\Http\Controllers;

use App\Http\Middleware\TeacherMiddleware;
use App\Mark;
use App\Quiz;
use App\Room;
use App\Student;
use App\Teacher;
use App\Total;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $i = 1;
        $user = Auth::user()->name;
        $quizzes = Teacher::where("name", $user)->first()->quizzes->sortByDesc("created_at");
        return view("teachers.quiz", compact("quizzes", "i"));
    }

    public function store()
    {
        $teacher = Teacher::where("name", Auth::user()->name)->first()->id;
        $this->validate(\request(), [
            'name' => "required",
            'marks' => 'required|numeric'
        ]);

        $quiz = Quiz::create([
            'name' => \request('name'),
            'marks' => \request("marks"),
            'teacher_id' => $teacher,
            'lesson_id' => \request("lesson"),
            'room_id' => \request("room")
        ]);
        $quiz_id = $quiz->id;
        $students = Quiz::find($quiz_id)->room->students;
        // $lesson = Quiz::find($quiz_id)->id;
        foreach ($students as $student) {
            Mark::create([
                'quiz_id' => $quiz_id,
                'student_id' => $student->id,
                'lesson_id' => \request("lesson"),
                'total' => \request("marks"),
                'marks' => null
            ]);
          
        }
        session()->flash("success", "Quiz added successfully");
        return back();
    }

    public function thisQuiz($id)
    {
        $quiz = Quiz::find($id);
        $students = $quiz->room->students->sortBy("fname");
        $i = 1;
        return view("teachers.thisQuiz", compact("quiz", "students", "i"));
    }

    public function lesson($id)
    {

        $lessons = Teacher::where("name", Auth::user()->name)->first()->lessons->where("room_id", $id);
        return view("ajax.lesson", compact("lessons"));
    }

    public function delete($id)
    {
        Quiz::find($id)->delete();
        Mark::where("quiz_id", $id)->delete();
        session()->flash("success", "Quiz deleted successfully");
        return back();
    }

    public function update($marks, $std_id, $quiz_id)
    {
        $total = Quiz::find($quiz_id)->marks;
      /*  $lesson = Quiz::find($quiz_id)->lesson->id;
        if (Mark::where("lesson_id", $lesson)
            ->where("student_id", $std_id)
            ->pluck("total")->sum() != 0) {
            $total_marks = round(100 * Mark::where("lesson_id", $lesson)
                    ->where("student_id", $std_id)
                    ->pluck("marks")->sum() / Mark::where("lesson_id", $lesson)
                    ->where("student_id", $std_id)
                    ->pluck("total")->sum(), 2);
            Total::where("student_id",$std_id)->where("lesson_id",$lesson)->update(["quiz"=>$total_marks]);
        }
      */
        if ($marks > $total) {
            return "error";
        }
         if (Mark::where("student_id", $std_id)->where("quiz_id", $quiz_id)->count()==0) {
            Mark::create([
                "quiz_id"=>$quiz_id,
                "student_id"=>$std_id,
                "lesson_id"=>Quiz::find($quiz_id)->lesson->id,
                "total"=>$total,
                "marks"=>$marks
            ]);
        } 
        
        Mark::where("student_id", $std_id)->where("quiz_id", $quiz_id)->update([
            'marks' => $marks
        ]);
        
        return $marks . " Marks Successfully Assigned To " . Student::find($std_id)->fname;
    }
}
