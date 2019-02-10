@extends('layouts.master')
@section('title')
    Update {{ $student->fname }}
@endsection
@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

        <div class="card">
            <div class="card-header">Update {{ $student->fname }} Credentials</div>
                <form action="/update/{{ $student->id }}" method="post">
                    <div class="card-body">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="fname">Full Names</label>
                        <input type="text" class="form-control" name="fname" id="fname" value="{{ $student->fname }}">
                    </div>
                    <div class="form-group">
                        <label for="father">Father's Names</label>
                        <input type="text" class="form-control" name="father" id="father" value="{{ $student->father }}">
                    </div>
                    <div class="form-group">
                        <label for="mother">Mother's Names</label>
                        <input type="text" class="form-control" name="mother" id="mother" value="{{ $student->mother }}">
                    </div>
                    <div class="form-group">
                        <label for="contact">Parent's Contact</label>
                        <input type="text" class="form-control" name="contact" id="contact" value="{{ $student->contact }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" id="address" cols="30" rows="3" class="form-control">{{ $student->address }}</textarea>
                    </div>
                        @include('layouts.error')
                        <div class="form-group bmd-form-group float-right">
                            <input type="submit" class="btn btn-info btn-raised" value="Update">
                        </div>
                    </div>

                </form>

        </div>
    </div>
        </div>
    </div>
@endsection