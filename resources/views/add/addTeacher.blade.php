@extends("layouts.master")
@section("title","Add Teacher")
@section("active","add")
@section("body")
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Add Teacher</div>
                <div class="card-body">
                    <form method="post" action="{{ url("addTeacher") }}">
                        {{ csrf_field() }}
                        <div class="form-grouping bmd-form-group">
                            <label class="bmd-label-floating">Names</label>
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Degree</label>
                            <input type="text" class="form-control" name="degree" value="{{ old("degree") }}">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">Contact</label>
                            <input type="text" class="form-control" name="contact" value="{{ old("contact") }}">
                        </div>
                        <div class="form-group bmd-form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <optgroup label="Select Gender">
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                </optgroup>
                            </select>
                        </div>
                        @include("layouts.error")
                        <div class="form-group">
                            <input type="submit" value="Register" class="btn btn-info btn-raised float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <img class="float-right" src="{{ asset('images/loading.gif') }}" id="loader" style="width: 30px;height: 30px;">
            <table class="table" id="table">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>No</th>
                    <th>Names</th>
                    <th>Gender</th>
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
    <div class="modal fade" id="teacherModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
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
            $.get("/teacher/table?p=view", function (data) {
            
                $("tbody").html(data);
                 $("#loader").hide();
                tableData(); 

            });
        }
        function tableData() {
            $("#table").Tabledit({
                url: "/teacher/table",
                restoreButton: false,
                hideIdentifier: true,
                columns: {
                    identifier: [0, 'id'],
                    editable: [[2, 'name'],[3,'gender','{"0":"Female","1":"Male"}'], [4, 'degree'], [5, 'contact']]
                },
                buttons: {
                    edit: {
                        class: 'btn btn-info',
                        html: '<span class="fa fa-edit fa-lg"></span>',
                        action: 'edit'
                    },
                    delete: {
                        class: 'btn btn-danger',
                        html: '<span class="fa fa-trash fa-lg"></span>',
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