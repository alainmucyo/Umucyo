@extends('layouts.master')
@section('active','students')
@section('title','Student')
 @section('body')
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <b>Student:</b> {{ $student->fname }}
                <a href="/update/{{ $student->id }}" class="btn btn-outline-info btn-info float-right">Update</a>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>Class:</b>{{ $student->room->class }}</li>
                    <li class="list-group-item"><b>Level:</b>{{ $student->room->level->name }}</li>
                    <li class="list-group-item"><b>Parent Contact</b>{{ $student->contact }}</li>
                    <li class="list-group-item"><b>Father Name:</b>{{ $student->father }}</li>
                    <li class="list-group-item"><b>Mother Name:</b>{{ $student->mother }}</li>
                    <li class="list-group-item"><b>Student's Address:</b>{{ $student->address }}</li>
                </ul>
            </div>
            <div class="card-footer">
                <a href="/delete/{{ $student->id }}" class="btn btn-danger btn-outline-danger" onclick="return confirm('Are You Sure You Want To Delete {{ $student->fname }}?')">Delete</a>
                <a href="/sms/{{ $student->id }}" class="btn btn-primary float-right btn-outline-primary">Contact Parent</a>
            </div>
        </div>
     </div>
     </div>
     </div>
 @endsection