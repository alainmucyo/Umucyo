@extends("layouts.app")
@section("title","Quizzes")
@section("active","quiz")
@section("body")
    <div class="card">
        <div class="card-header">
            My Quizzes
        </div>
        <div class="card-body">
            <div class="list-group list-group-flush">
                @foreach($quizzes as $quiz)
                    <a class="list-group-item list-group-item-action"
                       href="{{ url('teacher/thisQuiz/'.$quiz->id) }}" data-toggle="popover" data-trigger="focus" data-html="true"
                       data-title="Choose Action" tabindex="0"
                       data-content="<a href='' class='btn btn-info btn-raised'>Continue</a><a href='/teacher/delete/{{ $quiz->id }}' class='btn btn-danger'>Delete</a>"
                       data-placement="top">{{ $i++ }}. {{ $quiz->name }}
                        of {{ $quiz->lesson->name }} in {{ $quiz->room->class }}, {{ $quiz->room->level->name }}
                        over &nbsp;<b> {{ $quiz->marks }} marks.</b> <br>
                        <div class="container"><span
                                    class="text-muted float-right">{{ $quiz->created_at->diffForHumans() }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
@endsection