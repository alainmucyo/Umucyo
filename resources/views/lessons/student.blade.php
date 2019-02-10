@extends("layouts.master")
@section("title","Lessons management")
@section("active","Students")
@section("body")
    <div class="container">
        @if(\App\Lesson::find($lesson)->quizzes->count() !=0)
            <div class="card">
                <div class="card-header">
                    <b>Level : </b>{{ \App\Lesson::find($lesson)->room->level->name }}<span class="float-right">Lesson is over <b>{{ \App\Lesson::find($lesson)->hours*10 }}</b> marks.</span><br>
                    <b>Class : </b>{{ \App\Lesson::find($lesson)->room->class }}<span class="float-right"> <b>Number of quizzes: </b> {{ \App\Lesson::find($lesson)->quizzes->count()  }} </span>
                    <br>
                    <b>Teacher : </b>{{ \App\Lesson::find($lesson)->teacher->name }}<a
                            class="float-right btn btn-primary btn-outline-primary" href="/lesson/exam/{{ $lesson }}">Examination</a><br>

                    <b>Lesson : </b>{{ \App\Lesson::find($lesson)->name }} <h4 class="text-center">Lesson
                        Percent: @if(\App\Mark::where("lesson_id",$lesson)->pluck("total")->sum() != 0){{ round(100*\App\Mark::where("lesson_id",$lesson)->pluck("marks")->sum()/\App\Mark::where("lesson_id",$lesson)->pluck("total")->sum(),2) }}@else
                            0 @endif%</h4>

                </div>
                <div class="card-body">
                    <table class="table" id="dataDable">
                        <thead>
                        <tr>
                            <th>N<sub>O_</sub></th>
                            <th>Names</th>
                            <th>Marks/{{ \App\Lesson::find($lesson)->hours*10 }}</th>
                            <th>Percent</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $student->fname }}</td>
                                <td>@if($student->marks->where("lesson_id",$lesson)->pluck("total")->sum() != 0){{ round(\App\Lesson::find($lesson)->hours*10*$student->marks->where("lesson_id",$lesson)->pluck("marks")->sum()/$student->marks->where("lesson_id",$lesson)->pluck("total")->sum(),2) }}@else
                                        0 @endif
                                </td>
                                <td>@if($student->marks->where("lesson_id",$lesson)->pluck("total")->sum() != 0){{ round(100*$student->marks->where("lesson_id",$lesson)->pluck("marks")->sum()/$student->marks->where("lesson_id",$lesson)->pluck("total")->sum(),2) }}@else
                                        0 @endif%
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer"></div>
            </div>
        @else
            <div class="alert alert-danger text-center">
                <h2>No Quiz in this lesson.</h2>
            </div>
        @endif
    </div>

@endsection