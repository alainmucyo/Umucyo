@extends("layouts.master")
@section("title","Send MESSAGE")
@section("active","sms")
@section("body")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Send Message To {{ $student->fname }}'s Parents</div>
                    <div class="card-body">
                        <form method="post" action="{{ url("sms/".$student->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Message Title</label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="form-group bmd-form-group">
                                <label for="content" class="bmd-label-floating">Message Content</label>
                                <textarea name="content" id="content" cols="30" rows="4" class="form-control"
                                          required></textarea>
                            </div>
                            @include("layouts.error")
                            <div class="form-group">
                                <input type="submit" class="btn btn-info btn-raised float-right"
                                       value="Send &nbsp; &#10095;">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

