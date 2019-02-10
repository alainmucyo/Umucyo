@extends('layouts.master')
@section('title','Login')
    @section('active','login')
@section('body')
    <div class="container" style="margin-bottom: 15%">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">LOGIN FORM</div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group bmd-form-group">
                                <label for="email" class="bmd-label-floating">Email Address/Username</label>
                                <input type="text" class="form-control" name="email" id="pass" value="{{ old('email') }}">
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="pass" class="bmd-label-floating">Password</label>
                                <input type="password" class="form-control" name="password" id="pass" value="{{ old('password') }}">
                            </div>

                            @include('layouts.error')
                            <div>
                                <a href="{{ route('password.request') }}" class="btn btn-link " >Reset Password.</a>
                            </div>
                            <div class="form-group float-right">
                                <input type="submit" class="btn btn-info btn-raised" value="Login">
                                <input type="reset" class="btn btn-default" value="Cancel">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection