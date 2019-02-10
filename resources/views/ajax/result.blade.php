<div class="card" style="overflow: hidden">
    <div class="card-header">
        Result For: {{ $search }}
        <span class="float-right">Back To Students, <a href="{{ url("/students") }}" class="btn btn-success btn-raised">Click Me</a></span>
    </div>
    <div class="card-body">
        <table class="table" id="dataTable" style="min-width: 100%;">
            <thead>
            <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Level</th>
                <th>Parent Contact</th>
                <th>Father</th>
                <th>Mother</th>
                <th>Address</th>
                <th>Delete</th>
                <th>Update</th>
                <th>Contact</th>
                <th>Quiz</th>
                <th>Exam</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td><a href="/student/alone/{{ $result->id }}" style="color: black"> {{ $result->fname }}</a></td>
                    <td>{{ $result->room->class }}</td>
                    <td>{{ $result->room->level->name }}</td>
                    <td>{{ $result->contact }}</td>
                    <td>{{ $result->father }}</td>
                    <td>{{ $result->mother }}</td>
                    <td>{{ $result->address }}</td>
                    <td><a href="delete/{{ $result->id }}" class="btn btn-danger"></a><span class="fa fa-trash"></span>
                    </td>
                    <td><a href="update/{{ $result->id }}" class="btn btn-success"></a><span class="fa fa-edit"></span>
                    </td>
                    <td><a href="sms/{{ $result->id }}" class="btn btn-primary"></a><span class="fa fa-phone"></span>
                    </td>
                    <td>@if($student->marks->pluck("total")->sum() != 0){{ round(100*$student->marks->pluck("marks")->sum()/$student->marks->pluck("total")->sum(),2) }}@else
                            0 @endif%
                    </td>
                    <td>@if($student->totals->pluck("total")->sum() != 0){{ round(100*$student->totals->pluck("marks")->sum()/$student->totals->pluck("total")->sum(),2) }}@else
                            0 @endif%
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script src="{{ asset("js/app.js") }}"></script>
@include("layouts.datatable")
<script type="text/javascript">
    $(function () {
        var table = $('#dataTable').DataTable({
            dom: 'Bfrtip',
            search: false,
            columnDefs: [
                {
                    targets: 1,
                    className: 'noVis'
                }
            ],

            "columnDefs": [
                {
                    "targets": [4, 5, 6, 7, 8, 9],
                    "visible": false,
                    "searchable": false
                },

            ],
            lengthChange: false,
            buttons: ['copy', 'excel', 'pdf', 'colvis']

        });

    });

</script>
