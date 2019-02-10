@extends("layouts.master")
@section("title","Lessons management")
@section("active","lessons")
@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="margin: 2%;">
                    <div class="card-header">
                        <b>Level:</b> {{ $room->level->name }}<br>
                        <b>Class:</b>{{ $room->class }}
                    </div>
                    <div class="card-body ">
                        <div class="list-group">

                            @foreach($lessons as $lesson)
                               
                                     <a class="list-group-item list-group-item-action"
                       href="/lesson/{{ $lesson->id }}" data-toggle="popover" data-trigger="focus" data-html="true"
                       data-title="Choose Action" tabindex="0"
                       data-content="<div class='btn-group'><a href='/lesson/{{ $lesson->id }}' class='btn btn-info btn-outline-info'>Continue</a><a href='/lesson/students/{{ $lesson->id }}' class='btn btn-primary btn-outline-primary'>Students</a></div>"
                       data-placement="top">{{ $lesson->name }}
                    </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">Select Class</div>
                    <div class="card-body">
                        <label>Select Level</label>
                        <select class="custom-select" id="sel">
                            <optgroup label="Available Levels">
                                @foreach($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>

                        <div id="app"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script type="text/javascript">
        $(function () {

            var selected = $("#sel").val();
            $.get("/lessons/select/" + selected, function (data) {
                $("#app").html(data);
            });
            $("#sel").change(function () {
                selected = $("#sel").val();
                $.get("/lessons/select/" + selected, function (data) {
                    $("#app").html(data);
                });
            });
        });
    </script>
@endsection