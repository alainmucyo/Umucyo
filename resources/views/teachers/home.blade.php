@extends("layouts.app")
@section("title","My Lessons")
@section("active","home")
@section("body")
    <div class="card">
        <div class="card-header">
            <h3>My Lessons' Quizzes</h3>
        </div>
        <div class="card-body">
        {!! $chart->container() !!}
        <script src="{{ asset("js/Chart.min.js") }}"></script>
        {!! $chart->script() !!}
        </div>
    </div>
@endsection