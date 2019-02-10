@extends('layouts.master')
@section('active','students')
@section('title','Students')
    @section('search')
        <input class="form-control mr-sm-2" type="search" placeholder="Search For Student" aria-label="Search" id="search">
        @endsection
@section('body')
    <div class="container-fluid" id="result">
        <button class="float-right btn btn-warning btn-raised" id="toggle">Hide/Show</button><br><br>
    <div class="row justify-content-center">

        <div class="col-md-8" id="first">

        <div  style="margin-bottom: 1.5%" id="main">
                <div class="card-header"> Please Select Class</div>
            <div class="card-body">

            </div>
            </div>
            <div id="wait" class="card card-body">
                <img src="images/loading.gif" alt="Loading..." style="width: 60%">
            </div>
        </div>
        <div class="col-md-4" id="loader">
            <div class=" card border-left border-info">
                <div class="card-header">
                <div class="form-group">
                    <label for="sel">Select Level</label>
                    <select name="" id="sel" class="form-control">
                        <optgroup label="Level">
                            @foreach($levels as $level)
                            <option value="{{ $level->id }}" selected="selected">{{ $level->name }}</option>
                                @endforeach
                        </optgroup>
                    </select>
                    <div id="app">
                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
   
    </div>
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            var sel = $("#sel").val();
            $.get('students/' + sel, function (data) {
                $("#app").html(data);
            });
            $('#sel').change(function () {
                sel = $("#sel").val();
                $.get('students/' + sel, function (data) {
                    $("#app").html(data);
                });
            });
        });
    </script>
    <script>
        $(function () {
            $("#wait").hide();
            $(document).ajaxStart(function(){
                $("#main").hide();
                $("#wait").show();
            });
            $(document).ajaxComplete(function(){
                $("#main").show();
                $('#wait').hide();
            });
        })
    </script>
    <script>
        $(function () {
            $("#search").keyup(function () {
                var data=$("#search").val();
                $.get('/student/search/'+data,function (data) {
                    $("#result").html(data);
                });
            });
        });
    </script>
<script type="text/javascript">
    $(function(){
        $("#toggle").click(function(){
            $("#loader").toggle();
            $("#first").toggleClass("col-md-12");
            $(this).toggleClass("btn-raised")
        });
    });
</script>
@endsection