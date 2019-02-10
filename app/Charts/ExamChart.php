<?php

namespace App\Charts;

use App\Teacher;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\Auth;

class ExamChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $lessons = Teacher::where("name", Auth::user()->name)->first()->lessons;
        $marks = array();
        $names = array();
        foreach ($lessons as $lesson) {
            array_push($names, $lesson->name);
            if ($lesson->totals->pluck("total")->sum() != 0) {
                array_push($marks, round(100 * $lesson->totals->pluck("marks")->sum() / $lesson->totals->pluck("total")->sum(), 2));
            } else {
                array_push($marks, 0);
            }
        }
        $marks = array_merge($marks, [100]);
        $this->dataset(" My Examinations", "bar", $marks)
            ->color("rgba(2,117,216,1)")
            ->backgroundColor("rgba(2,117,216,0.2)");
        $this->labels($names);
        parent::__construct();
    }
}
