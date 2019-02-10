@extends('layouts.master')
@section('title','Send SMS Manually')
@section('active','sms')
@section('body')
    <div class="container-fluid" style="margin-bottom: 17%">
        <div class="row justify-content-center">
            <div class="col-md-5" style="margin-bottom:  20px">
                <div class="card">
                    <div class="card-header">
                       <h3> Send message to all parents</h3>
                    </div>
                    <div class="card-body">
                       <form method="post" action="{{ url("sms/0") }}">
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
            <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Messages Sent
                </div>
                <div class="card-body">
                      <ul class="list-group list-group-flush">
                            @foreach($messages as $message)
                                <li class="list-group-item border border-info" style="border-radius: 3%">
                                    <div class="row">
                                       
                                        <div class="container">
                                            <a href="/sms/delete/{{ $message->id }}" class="btn btn-danger" style="position: absolute;left: 88%" onclick="return confirm('Delete this message?')"><span class="fa fa-trash fa-lg"></span></a>
                                            <h4>{{ $message->title }}</h4>
                                            {{ $message->body }}<br><br>
                                            <p class="float-right text-muted" style="position: absolute;left: 75%">Sent: {{ $message->created_at->diffForHumans() }} </p>
                                        </div>
                                    </div>
                                    <br>
                                </li><nobr>&nbsp;</nobr>
                            @endforeach
                        </ul>
                        {!! $messages->links() !!}
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection