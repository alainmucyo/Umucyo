@extends("layouts.app")
@section("title","Examination")
@section("active","exam")
@section("body")
    <div class="card">
        <div class="card-header">
            My Examinations
            <a href="#" class="btn btn-raised btn-info float-right" data-toggle="modal"
               data-target="#exampleModal2"><span class="fa fa-plus fa-lg"></span> Add Exam</a>
        </div>
        @if($exames->count() !=0)
            <div class="card-body">
                <div class="list-group list-group-flush">

                    @foreach($exames as $exam)
                        <a class="list-group-item list-group-item-action"
                           href="{{ url('teacher/thisExam/'.$exam->id) }}" data-toggle="popover" data-trigger="focus" data-html="true"
                           data-title="Choose Action" tabindex="0"
                           data-content="<a href='{{ url('teacher/thisExam/'.$exam->id) }}' class='btn btn-info btn-raised'>Continue</a><a href='/teacher/delete/exam/{{ $exam->id }}' class='btn btn-danger'>Delete</a>"
                           data-placement="top">{{ $i++ }}. {{ $exam->name }}
                            of {{ $exam->lesson->name }} in {{ $exam->room->class }}, {{ $exam->room->level->name }}
                            over &nbsp;<b> {{ $exam->marks }} marks.</b> <br>
                            <div class="container"><span
                                        class="text-muted float-right">{{ $exam->created_at->diffForHumans() }}</span>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
            <div class="card-footer">
                {!! $chart->container() !!}
                <script src="{{ asset("js/Chart.min.js") }}"></script>
                {!! $chart->script() !!}
            </div>
        @else
            <h2 class="text-danger">No Examinations</h2>
        @endif
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel1">ADD EXAM</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('teacher/addExam') }}" method="post">
                    <div class="modal-body">

                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="level" class="bmd-label-floating">Class Name</label>
                            <select name="room" class="form-control" id="room">
                                <optgroup label="Your Classes">
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->class }}
                                            in {{ $room->level->name }}</option>
                                    @endforeach
                                </optgroup>
                            </select>
                        </div>
                        <div id="result">
                            <div class="form-group"></div>
                        </div>
                        <p id="loader">Loading Lesson Please wait...</p>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Exam name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Total marks</label>
                            <input type="number" name="marks" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info btn-raised">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#loader").show();
            var lesson = $("#room").val();
            $.get("/teacher/lesson/" + lesson, function (data) {
                $("#loader").hide();
                $("#result").html(data);
            });
            $("#room").change(function () {

                var lesson = $("#room").val();
                $.get("/teacher/lesson/" + lesson, function (data) {
                    $("#loader").hide();

                    $("#result").html(data);

                });

            });
        });
    </script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="popover"]').popover();
        });
        $('.popover-dismiss').popover({
            trigger: 'focus'
        });
    </script>

@endsection