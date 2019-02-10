@extends("layouts.master")
@section("title","Lessons management")
@section("active","lessons")
@section("laod","viewData()")
@section("body")
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5" style="margin-bottom: 6px">
                <div class="card">
                    <div class="card-header">
                        <h4>Assign Teacher To Lesson</h4>
                        <b>Lesson: </b>{{ $lesson->name }}<br>
                        <b>Class: </b>{{ $lesson->room->class }}
                    </div>
                    <div class="card-body">
                        <div class="card-title">
                            <b>Hours Per Week: </b>{{ $lesson->hours }}
                        </div>
                        <b>Teacher For This Lesson: </b>@if($lesson->teacher==null) No Teacher
                        @else {{ $lesson->teacher->name }}
                        @endif
                        <form method="post" action="{{ url("lesson/update/".$lesson->id) }}">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Select Teacher</label>
                                <select name="teacher" class="custom-select">
                                    <optgroup label="Select Teacher">
                                        <option value="0">Remove Teacher</option>
                                        @foreach($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <input type="hidden" value="{{ $lesson->room->id }}" name="room_id">
                            @if($lesson->teacher != null)
                                <input type="hidden" value="{{ $lesson->teacher->id }}" name="teacher_id">
                            @endif
                            <div class="form-group">
                                <input type="submit" value="Assign" class="btn btn-info btn-block btn-raised">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header"><h3>Level: {{ $lesson->room->level->name }} <img class="float-right"
                                                                                              width="30px" height="30px"
                                                                                              id="loader"
                                                                                              src="{{ asset('images/loading.gif') }}"></h3></div>
                    <div class="card-body">
                        <div class="card-title"><h4>Teachers in {{ $lesson->room->class }}</h4></div>
                        <table class="table table-responsive-sm" id="table">
                            <thead>
                            <tr>
                                <th>Id</th>
                                <th>No</th>
                                <th>Names</th>
                                <th>Degree</th>
                                <th>Contact</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section("tableEdit")
    <script type="text/javascript">
        $(function () {
            $("#loader").show();
            viewData();
        });
        function viewData() {
            $.get("/lesson/table/{{ $lesson->id }}?p=view", function (data) {
                $("tbody").html(data);
                $("#loader").hide();
                tableData();

            });
        }
        function tableData() {
            $("#table").Tabledit({
                url: "/lesson/table/{{ $lesson->id }}",
                restoreButton: false,
                hideIdentifier: true,
                columns: {
                    identifier: [0, 'id'],
                    editable: [[2, 'name'], [3, 'degree'], [4, 'contact']]
                },
                buttons: {
                    edit: {
                        class: 'btn btn-info',
                        html: '<span class="fa fa-lg fa-edit"></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'btn btn-danger',
                        html: '<span class="fa fa-lg fa-trash"></span>',
                        action: 'delete'
                    },
                    save: {
                        class: 'btn btn-sm btn-success btn-raised',
                        html: 'Save'
                    },

                    confirm: {
                        class: 'btn btn-sm btn-raised btn-danger',
                        html: 'Confirm?'
                    }
                },
                onSuccess: function (data, textStatus, jqXHR) {
                  viewData();
                   
                },
                onFail: function (jqXHR, textStatus, errorThrown) {
                    viewData();
                    //$("#loader").hide();
                  
                },

                onAjax: function (action, serialize) {
                    $("#loader").show();
                }
            })
        }
    </script>
@endsection