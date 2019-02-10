<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('content')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="MUCYO Alain">
    <title>UMUCYO | @yield('title')</title>
    <link rel="stylesheet" type="text/css"
          href="{{ asset('bootstrap-material-design-dist/css/bootstrap-material-design.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('datatable/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('noty.css') }}">
    <link rel="icon" type="icon" href="{{ asset("favicon.ico") }}">
    <script type="text/javascript" src="{{ asset('noty.js') }}"></script>
</head>
<body>
<body class="bg-light">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                UMUCYO School Management
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item home">
                        <a class="nav-link" href="/teacher/index"><span class="fa fa-home fa-lg"></span> Home </a>
                    </li>
                    <li class="nav-item quiz">
                        <a class="nav-link" href="/teacher/quiz"><span class="fa fa-question fa-lg"></span> Quizzes </a>
                    </li>
                    <li class="nav-item exam">
                        <a class="nav-link" href="/teacher/exam"><span class="fa fa-question-circle fa-lg"></span>
                            Exames </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><span
                                        class="fa fa-sign-out fa-lg"></span>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8" style="margin-bottom: 2%">
                    @yield('body')
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            MY CLASSES
                        </div>
                        <div class="card-body">
                            <div class="list-group">
                                @foreach($courses as $course)
                                    <a href="/teacher/room/{{ $course->id }}"
                                       class="list-group-item list-group-item-action"
                                       title="{{ $course->room->level->name }}">{{ $course->name }}
                                        in {{ $course->room->class }}</a>
                                @endforeach
                                <a href="#" class="list-group-item list-group-item-action list-group-item-info"
                                   data-toggle="modal" data-target="#addQuizModal"><span
                                            class="fa fa-plus fa-lg"></span> Add Quiz</a><br>

                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>
<footer style="margin-bottom: 0">
    <div class="text-center bg-info" style="height: 4%">
        <div class="container text-white " style="padding: 3%">
            <h3> &copy; 2018,Inc | Privacy Policy </h3>
            <h4>Designed By Alain</h4>
        </div>
    </div>
</footer>
</body>
<div class="modal fade" id="addQuizModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel1">ADD QUIZZ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('teacher/addQuiz') }}" method="post">
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
                        <label class="bmd-label-floating">Quiz name</label>
                        <input type="text" name="name" class="form-control" required="">
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

</body>

<script src="{{ asset('js/app.js') }}"></script>
@include("layouts.datatable")
<script>
    $(function () {
        $(".table").DataTable();
    });
</script>
<script type="text/javascript" src="{{ asset("js/popper.js") }}"></script>
<script src="{{ asset('bootstrap-material-design-dist/js/bootstrap-material-design.js') }}"
        type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("js/application.js") }}"></script>

<script type="text/javascript" src="{{ asset('js/jquery.noty.packaged.js') }}"></script>
<script type="text/javascript">
    $(function () {
        $(".@yield('active')").addClass('active');
    });
</script>
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
@if(session('success'))
    <script>
        $.noty.defaults.killer = true;
        noty({
            text: '{{ session('success') }}!',
            layout: 'topCenter',
            type: 'success'
        });
    </script>

@endif

</html>
