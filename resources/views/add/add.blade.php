@extends('layouts.master')
@section('title','Add Student')
@section('active','add')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        ADD STUDENT
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/addStudent') }}" method="post">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="name" class="bmd-label-floating">Full Names</label>
                                    <input type="text" class="form-control" id="name" name="fname"
                                           value="{{ old('fname') }}" required="required">
                                </div>

                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="mother" class="bmd-label-floating">Mother's Names </label>
                                    <input type="text" class="form-control" id="mother" name="mother"
                                           value="{{ old('mother') }}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="father" class="bmd-label-floating">Father's Names </label>
                                    <input type="text" class="form-control" id="father" name="father"
                                           value="{{ old('father') }}">
                                </div>
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="contact" class="bmd-label-floating">Parent's Contact</label>
                                    <input type="tel" class="form-control" id="contact" name="contact"
                                           value="{{ old('contact') }}" required="required">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group bmd-form-group col-md-6">
                                    <label for="level" class="bmd-label-floating">Select Level</label>
                                    <select name="level" id="level" class="form-control">
                                        <optgroup label="Available Levels">
                                            @foreach($levels as $level)
                                                <option value="{{ $level->id }}">{{ $level->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <div id="app"></div>
                                    <div class="form-group" id="wait">
                                        <img src="{{ asset('images/loading.gif') }}" alt="Loading..." style="width: 5%">Loading
                                        Class...
                                    </div>
                                </div>
                                    <div class="form-group bmd-form-group col-md-2">
                                        <label for="gender">
                                            Gender
                                        </label>
                                        <select name="gender" id="gender" class="form-control" required>
                                            <optgroup label="Select Gender">
                                                    <option value="0">Female</option>
                                                    <option value="1">Male</option>
                                            </optgroup>
                                        </select>
                                    </div>
                            </div>

                            <div class="form-group bmd-form-group">
                                <label for="address" class="bmd-label-floating">Student's Address</label>
                                <textarea name="address" id="address" cols="30" rows="3" class="form-control"
                                          style="resize: none" required="required">{{ old('address') }}</textarea>
                            </div>
                            <div class="form-group float-right">
                                <input type="submit" class="btn btn-info btn-outline-info" value="Save">
                                <input type="reset" class="btn btn-default" value="Reset">
                            </div>
                        </form>

                    </div>
                    <div class="card-footer">
                        @include('layouts.error')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script>
        $(function () {
            var value = $("#level").val();
            $.get('test/' + value, function (data) {
                $("#app").html(data);
            });
            $("#level").change(function () {
                value = $("#level").val();
                $.get('test/' + value, function (data) {
                    $("#app").html(data);
                });
            });
        })
    </script>
    <script>
        $(function () {
            $("#wait").hide();
            $(document).ajaxStart(function () {
                $("#app").hide();
                $("#wait").show();
            });
            $(document).ajaxComplete(function () {
                $("#app").show();
                $('#wait').hide();
            });
        })
    </script>
@endsection