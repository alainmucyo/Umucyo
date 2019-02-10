@extends('layouts.master')
@section('active','home')
@section('title','Dashboard')
@section('body')

    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-11">
        <div class="alert alert-success float-right" style="cursor: pointer;" data-toggle="modal" data-target="#periodModal">
            <span>Year: {{ $period->year }}, {{ $period->term}}@if($period->term==1)<sup>st</sup> @elseif($period->term==2)<sup>nd</sup>@else <sup>rd</sup>@endif Term</span>
        </div>
</div>
    </div>
        <hr>
        <div class="container-fluid">

            <div class="row">
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-primary text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-institution fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1 class="huge">{{ $levels->count() }}</h1>
                                    <div>Levels!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#main" class="mySelect" link-name="levels" id="first">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-danger text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-group fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1 class="huge">{{ $rooms->count() }}</h1>
                                    <div>Classes!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#main" class="mySelect" link-name="rooms">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-secondary text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-child fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1 class="huge">{{ $students->count() }}</h1>
                                    <div>Students!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#main" class="mySelect" link-name="students">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-warning text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1>{{ $teachers->count() }}</h1>
                                    <div>Teachers!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/addTeacher">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-success text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-book fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1 class="huge">{{ $lessons->count() }}</h1>
                                    <div>Lessons!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#main" class="mySelect" link-name="lessons">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-2 col-sm-6 mb-3">
                    <div class="card bg-dark text-white">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-2">
                                    <i class="fa fa-user-secret fa-5x"></i>
                                </div>
                                <div class="col-md-10 text-right">
                                    <h1 class="huge">{{ $admins->count() }}</h1>
                                    <div>Administrators!</div>
                                </div>
                            </div>
                        </div>
                        <a href="/register">
                            <div class="card-footer">
                                <span class="float-left">View Details</span>
                                <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div id="main"></div>
            <div class="card" id="mainLoader">
                <div class="card-header">Loading Table...</div>
                <div class="card-body">
                    <img src="{{ asset('images/loading.gif') }}" style="height: 70%;width: 70%">
                </div>

            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="periodModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change School Period</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/period/update">
          {{ csrf_field() }}
      <div class="modal-body">
        <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Year</label>
            <input type="number" name="year" required="" min="2000" max="3000" class="form-control" value="{{ $period->year }}">
        </div>
          <div class="form-group bmd-form-group">
            <label class="bmd-label-floating">Term</label>
            <input type="number" name="term" max="3" min="1" required="" class="form-control" value="{{ $period->term }}">
             <small class="text-danger">* Please Make Sure That When You Change Year Or Term, Marks And Other History Will All Be Reset  </small>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-outline-info btn-info" onclick="return confirm('You Are About To Reset All Histories!')">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
    <script type="text/javascript">
        $(function () {
            $("#mainLoader").show();
            var link = $("#first").attr("link-name");
            $.get("tables/" + link, function (data) {
                $("#mainLoader").hide();
                $("#main").html(data);
            });
            $(".mySelect").click(function () {
                $("#mainLoader").show();
                var link = $(this).attr("link-name");
                $.get("tables/" + link, function (data) {
                    $("#mainLoader").hide();
                    $("#main").html(data);
                });
            });
        })
    </script>

@endsection