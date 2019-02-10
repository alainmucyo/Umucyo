<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('content')">
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
<body onload="@yield('load')">
<nav class="navbar navbar-expand-lg navbar-dark bg-info navbar-fixed-top" style="position: fixed;width: 100%">
    <a class="navbar-brand" href="/"> UMUCYO School Management</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item home">
                <a class="nav-link" href="{{ url('home') }}"> Home <span class="sr-only">(current)</span></a>
            </li>
            @if(auth()->check())
                <li class="nav-item dropdown add">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        add <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal1">
                            Add Level
                        </a>
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#exampleModal2">
                            Add Class
                        </a>
                        <a class="dropdown-item" href="{{ url('/addStudent') }}">
                            Add Student
                        </a>
                        <a class="dropdown-item" href="{{ url('/addTeacher') }}">
                            Add Teacher
                        </a>
                        <a class="dropdown-item" href="{{ url('/addLesson') }}">
                            Add Lesson
                        </a>
                    </div>

                </li>
                <li class="nav-item students">
                    <a class="nav-link" href="/students"> Students </a>
                </li>
                <li class="nav-item sms">
                    <a class="nav-link" href="/sms"> Send Message </a>
                </li>
                <li class="nav-item message">
                    <a class="nav-link" href="/messages"> Messages </a>
                </li>
                <li class="nav-item lessons">
                    <a class="nav-link" href="/lessons"> Lessons </a>
                </li>
            @endif


        </ul>
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="teacher"><a class="nav-link" href="{{ url("teacher_register")}}"><span
                            class="fa fa-user fa-lg"></span> Register</a></li>
            <li class="login"><a class="nav-link" href="{{ route('login') }}"><span
                            class="fa fa-sign-in fa-lg"></span> {{ __('Login') }}</a></li>

            @else
                <form class="form-inline my-2 my-lg-0">
                  <!--  @yield('search') -->
                </form>
                <li class="register"><a class="nav-link" href="{{ route('register') }}"> Admin</a></li>

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
                            {{ __('Logout ') }} &nbsp;&nbsp;&nbsp;
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
        </ul>
    </div>
</nav>
<br><br><br><br><br>
<body class="bg-light">
@yield('body')<br><br>
<footer style="margin-bottom: 0">
    <div class="text-center bg-info" style="height: 4%">
        <div class="container text-white " style="padding: 3%">
            <h3> &copy; 2018,Inc | Privacy Policy </h3>
            <h4>Designed By Alain</h4>
        </div>
    </div>

</footer>
<!-- Modal -->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD CLASS</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('/addClass') }}" method="post">
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group bmd-form-group">
                        <label for="level" class="bmd-label-floating">Select Level</label>
                        <select name="level" id="level" class="form-control">
                            <optgroup label="Levels">
                                @foreach($sel_level as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>
                    <div class="form-group bmd-form-group">
                        <label for="class" class="bmd-label-floating">Class Name</label>
                        <input type="text" class="form-control" name="class" id="class">
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
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">ADD LEVEL</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/addLevel" method="post">
                <div class="modal-body">

                    {{ csrf_field() }}
                    <div class="form-group bmd-form-group">
                        <label for="level" class="bmd-label-floating">Level Name</label>
                        <input type="text" class="form-control" name="name" id="level">
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
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@include("layouts.datatable")
<script type="text/javascript">
    $(function () {
        var table = $('#table').DataTable({
            dom: 'Bfrtip',
            columnDefs: [
                {
                    targets: 1,
                    className: 'noVis'
                }
            ],

            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis ']

        });

    });

</script>
<script type="text/javascript">
    $(function () {
        var table = $('#dataDable').DataTable({
            dom: 'Bfrtip',
            columnDefs: [
                {
                    targets: 1,
                    className: 'noVis'
                }
            ],

            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']

        });
        table.buttons().container()
            .appendTo('#example_wrapper .col-sm-6:eq(0)');
        $("#data").on("click", "tbody tr", function () {

        })
    });
</script>
<script type="text/javascript" src="{{ asset("js/popper.js") }}"></script>
<script src="{{ asset('bootstrap-material-design-dist/js/bootstrap-material-design.js') }}"
        type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("js/application.js") }}"></script>
<script type="text/javascript" src="{{ asset("js/jquery.tabledit.js") }}"></script>
@yield("tableEdit")
<script type="text/javascript">
    $(function () {
        $(".@yield('active')").addClass('active');
    })
</script>

<script type="text/javascript" src="{{ asset('js/jquery.noty.packaged.js') }}"></script>
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

</body>
</html>