<div class="card">
    <div class="card-header">
        List Of Available Lessons <a href="/lessons" class="btn btn-primary btn-outline-primary float-right">More About Lessons</a>
        <img class="float-right" width="30px" height="30px" id="loader" src="{{ asset('images/loading.gif') }}">
    </div>
    <table class="table table-striped" id="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>No</th>
            <th>Name</th>
            <th>Hours</th>
            <th>Teacher</th>
            <th>Class</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
<script src="{{ asset("js/app.js") }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("js/jquery.tabledit.js") }}"></script>

<script type="text/javascript">
    $(function () {
        viewData();
    });
    function viewData() {
        $.get("/tables/edit/lessons?p=view", function (data) {
            $("tbody").html(data);
            $("#loader").hide();
            tableData();

        });
    }
    function tableData() {
        $("#table").Tabledit({
            url: "/tables/edit/lessons",
            restoreButton: false,
            hideIdentifier: true,
            columns: {
                identifier: [0, 'id'],
                editable: [[2, 'name'], [3, 'hours']]
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
                $("#loader").hide();

            },

            onAjax: function (action, serialize) {
                $("#loader").show();
            }
        })
    }
</script>
