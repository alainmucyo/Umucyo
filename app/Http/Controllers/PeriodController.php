<?php

namespace App\Http\Controllers;

use App\Mark;
use App\Mark_Archive;
use App\Period;
use App\Student;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function update()
    {
        Period::first()->update([
            'year' => \request("year"),
            "term" => \request("term")
        ]);
        $students = Student::get();
        $year = Period::first()->year;
        $term = Period::first()->term;
        foreach ($students as $student) {
            if ($student->marks->pluck("total")->sum() != 0) {
                $marks = round(100 * $student->marks->pluck("marks")->sum() / $student->marks->pluck("total")->sum(), 2);

            } else {
                $marks = 0;
            }
            if ($student->totals->pluck("total")->sum() != 0) {
                $exam = round(100 * $student->totals->pluck("marks")->sum() / $student->totals->pluck("total")->sum(), 2);
            } else {
                $exam = 0;
            }
            Mark_Archive::create([
                "student_id" => $student->id,
                "quiz" => $marks,
                "exam" => $exam,
                "year" => $year,
                "term" => $term
            ]);

        }
        foreach (Mark::get() as $item) {
            Mark::find($item->id)->delete();
        }
        session()->flash("success", "School Period Changed Successfully");
        return back();
    }
}
