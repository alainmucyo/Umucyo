@extends("layouts.master")
@section("title","Teacher Registration")
@section("active","teacher")
@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-bottom: 2%">
                <div class="card">
                    <div class="card-header">
                        <h4>Register For Teachers</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url("teacher_register") }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>Names</label>
                                <select name="name" class="form-control">
                                    <optgroup label="List Of Teachers">
                                        @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->name }}">{{ $teacher->name }}</option>
                                            @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input type="text" class="form-control" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            @include("layouts.error")
                            <div class="form-group">
                                <input type="submit" value="Register" class="btn btn-info btn-raised">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection