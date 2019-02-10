@extends("layouts.master")
@section("title","Add Lesson")
@section("active","add")
@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Lesson</div>
                    <div class="card-body">
                        <form method="post" action="{{ url("addLesson") }}">
                            {{ csrf_field() }}
                            <div class="form-group bmd-form-group">
                                <label>Level</label>
                                <select name="level" id="level" class="form-control">
                                    <optgroup label="Available Levels">
                                        @foreach($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div id="app"></div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Lesson Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Hours Per Week</label>
                                <input type="text" class="form-control" name="hours" value="{{ old("hours") }}">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label>Teacher</label>
                                <select name="teacher" class="form-control">
                                    <optgroup label="Available Levels">
                                        <option value="0">No Teacher...</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">This space is not required.</small>

                            </div>
                            @include("layouts.error")
                            <div class="form-group">
                                <input type="submit" value="Add Lesson" class="btn btn-info btn-raised float-right">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(function(){
            var value=$("#level").val();
            $.get('test/'+value,function (data) {
                $("#app").html(data);
            });
            $("#level").change(function () {
                value=$("#level").val();
                $.get('test/'+value,function (data) {
                    $("#app").html(data);
                });
            });
        })
    </script>
    @endsection