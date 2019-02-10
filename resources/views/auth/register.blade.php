@extends('layouts.master')
@section('active','register')
    @section("title","Admin Dashboard")
@section('body')
<div class="container" style="margin-bottom: 4%">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">ADD ADMIN</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group bmd-form-group">
                            <label for="name" class="bmd-label-floating">{{ __('Name') }}</label>


                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}"  autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group bmd-form-group">
                            <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif

                        </div>

                        <div class="form-group bmd-form-group">
                            <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>

                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" >

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group bmd-form-group">
                            <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>

                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>


                        <div class="form-group float-right">
                                <button type="submit" class="btn btn-info btn-raised">
                                    {{ __('Add Admin') }}
                                </button>
                            <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                    </form>
                        </div>

                </div>
            </div>
        <div class="col-md-6">
        <div class="card">
            <div class="card-header">LIST OF ADMINS</div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($admins as $admin)
                    <li class="list-group-item"><span class="col-sm-10">{{ $admin->name }}</span><a class="text-danger float-right" href="del_admin/{{ $admin->id }}" onclick="return confirm('Are You Sure You Want To Delete This Admin?');"> <span class="fa fa-trash "></span> </a> </li>
                        @endforeach
                </ul>
            </div>
        </div>
        </div>
    </div>
    </div>

@endsection
