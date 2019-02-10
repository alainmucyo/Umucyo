@extends('layouts.master')
@section('active','message')
@section('title','Sent Messages')
@section('body')
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-8" style="margin-bottom: 3%">
              <div class="card">
                  <div class="card-header">Messages</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach($messages as $message)
                                <li class="list-group-item border border-info" style="border-radius: 3%">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <p class="text-muted"> {{ $message->student->fname }}'s Parents </p>
                                        </div>
                                        <div class="container">
                                            <h4>{{ $message->title }}</h4>
                                            {{ $message->message }}<br><br>
                                            <p class="float-right text-muted" style="position: absolute;left: 75%">Sent: {{ $message->created_at->diffForHumans() }} </p>
                                        </div>
                                    </div>
                                    <br>
                                </li><nobr>&nbsp;</nobr>
                            @endforeach
                        </ul>
                    </div>
                   
                    {!! $messages->links() !!}
              </div>
          </div>
              <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Archives</div>
                    <div class="list-group">
                        <a href="/messages" class="list-group-item list-group-item-action">All</a>
                        @foreach($archives as $archive)
                            <a href="?month={{ $archive->month }}&year={{ $archive->year }}" class="list-group-item list-group-item-action">{{ $archive->month." ".$archive->year }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection