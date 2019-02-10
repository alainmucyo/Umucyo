@extends("layouts.app")
@section("title","My Lessons")
@section("active","quiz")
@section("body")
    <div class="card">

        <div class="card-header">
            <b>Level: </b>{{ $quiz->room->level->name }}<br>
            <b>Class: </b>{{ $quiz->room->class }}
        </div>
        <div class="card-body">
            <div class="card-title">
                <h6>
                    <b> {{ $quiz->lesson->name }} {{ $quiz->name }} over {{ $quiz->marks }} marks </b>
                </h6>
                <input type="hidden" value="{{ $quiz->marks }}" id="total">
                <table class="table">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Names</th>
                        <th>Marks</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($students as $student)
                     @php
                     $marks="";
                     if($quiz->room->students->find($student->id)->marks->where('quiz_id',$quiz->id)->count() != 0){
                     $marks=$quiz->room->students->find($student->id)->marks->where('quiz_id',$quiz->id)->first()->marks;
                 }
                 else{
                 $marks=0;
             }
                    @endphp
                        <tr>
                            <td>{{ $i++ }}.</td>
                            <td>{{ $student->fname }}</td>
                            <td>
                                <div class="row" id="main">
                                    <div class="col-md-10">
                                <input type="number"
                                       value="{{ $marks }}"
                                       class="form-control @if($marks<$quiz->marks/2) text-danger @endif"
                                       name="{{ $student->id }}" href="{{ $quiz->id }}" required>
                                    </div>
                                <img src="{{ asset("images/loading.gif") }}" style="width: 20px;height: 20px;display: none;" class="{{ $student->id }}">

                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $(".form-control").keyup(function () {
                var marks = $(this).val();
                var total = $("#total").val();
                if (parseFloat(marks) < parseFloat(total) / 2) {
                    $(this).addClass("text-danger");
                }
                else {
                    $(this).removeClass("text-danger");
                    if (parseFloat(marks) > parseFloat(total)) {
                        $(this).addClass("text-danger");
                    }
                }
                if (isNaN(parseFloat(marks))) {
                    $(this).addClass("text-danger");
                }


            });
            $(".form-control").blur(function () {
                var marks = $(this).val();
                var total = $("#total").val();
                var std_id = $(this).attr("name");
                var quiz_id = $(this).attr("href");
                $("."+std_id).show();
                if (isNaN(parseFloat(marks))) {
                    $("."+std_id).hide();
                    alert("Please enter valid marks");
                }
                else {
                    if (parseFloat(marks) > parseFloat(total)) {
                        $("."+std_id).hide();
                        alert("Wrong Marks");
                    } else {
                        $.get("/teacher/update/" + marks + "/" + std_id + "/" + quiz_id, function (data) {
                            $("."+std_id).hide();
                            if (data == "error") {
                                alert("Wrong marks");
                            }
                            else {
                                $.noty.defaults.killer = true;
                                noty({
                                    text: data,
                                    layout: 'topCenter',
                                    type: 'success'
                                });
                            }

                        });

                    }
                }
            });

        });
    </script>

@endsection