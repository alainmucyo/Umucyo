@extends("layouts.app")
@section("title","My Lessons")
@section("active","index")
@section("body")
    <div class="card">
        <div class="card-header">
            <h6><b>Level: </b>{{ $lesson->room->level->name }}<br></h6>
            <h6><b>Class: </b>{{ $lesson->room->class }}</h6>
            <h6><b>Lesson: </b>{{ $lesson->name }}</h6>
            <h5 class="float-right">{{ $lesson->quizzes->count() }} Quiz in this lesson.</h5>
        </div>
        <div class="card-body">
            <h5><b>Total Marks: </b>{{ $lesson->hours*10 }}</h5>
            <input type="hidden" value="{{ $lesson->hours*10 }}" id="total">
            @if(\App\Mark::where("lesson_id",$lesson->id)->count()!=0)
            <table class="table" id="table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Names</th>
                    <th>Marks/{{ $lesson->hours*10 }}</th>
                    <th>Percentage</th>
                </tr>
                </thead>
                <tbody>

                @foreach($students as $student)
                    <tr>
                        <td>{{ $i++ }}.</td>
                        <td>{{ $student->fname }}</td>
                        <td class="result">@if($student->marks->where("lesson_id",$lesson->id)->where('marks', '<>', '', 'and')
                        ->pluck("total")->sum() !=0 ){{ round($marks=$lesson->hours*10*$student->marks->where("lesson_id",$lesson->id)->pluck("marks")
                        ->sum()/$student->marks->where("lesson_id",$lesson->id)->where('marks', '<>', '', 'and')
                        ->pluck("total")->sum(),2) }}<input type="hidden" value="{{ $marks }}" class="marks"></td>
                        @else 0 @endif
                        <td class="percent">@if($student
                        ->marks->where("lesson_id",$lesson->id)->where('marks', '<>', '', 'and')
                        ->pluck("total")->sum() !=0 ){{ round(100*$student->marks->where("lesson_id",$lesson->id)->pluck("marks")->sum()/$student
                        ->marks->where("lesson_id",$lesson->id)->where('marks', '<>', '', 'and')
                        ->pluck("total")->sum(),2) }}% @else 0% @endif
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
                @else
            <h2 class="text-danger">No Quiz In This Class</h2>
                @endif
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
          $(".result").show(function () {
              var marks=$(this).text();
              var total=$("#total").val();
              if (parseFloat(marks)>parseFloat(total)/2 && parseFloat(marks)<parseFloat(total)*3/4){
                  $(this).addClass("text-info");
              }
              else if(parseFloat(marks)>parseFloat(total)*3/4){
                  $(this).addClass("text-success");
              }
              else{
                  $(this).addClass("text-danger");
              }
          });
            $(".percent").show(function () {
                var marks=$(this).text();
                var total=100;
                if (parseFloat(marks)>parseFloat(total)/2 && parseFloat(marks)<parseFloat(total)*3/4){
                    $(this).addClass("text-info");
                }
                else if(parseFloat(marks)>parseFloat(total)*3/4){
                    $(this).addClass("text-success");
                }
                else{
                    $(this).addClass("text-danger");
                }
            });
        });
    </script>
@endsection