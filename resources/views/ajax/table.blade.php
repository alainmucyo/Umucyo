<div class="card border-right border-info">
    <div class="card-header">
        <h5>Level:{{ $level->name }}</h5>
        <h5>Class:{{ $class->class }}</h5>
        List of  students</div>

    <div class="card-body">
        <table class="table table-stripped table-responsive-sm table-responsive-md table-responsive-lg" id="table">
            <thead>
            <tr>
                <th>No.</th>
                <th>Full Names</th>
                <th>Gender</th>
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
            @foreach($students as $student)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td><a href="/student/alone/{{ $student->id }}" style="color: black"> {{ $student->fname }}</a></td>
                    <td>{{ $student->gender ? "Male":"Female" }} </td>
                    <td>{{ $student->contact}}</td>
                    <td>{{ $student->father }}</td>
                    <td>{{ $student->mother }}</td>
                    <td>{{ $student->address }}</td>
                    <td><a href="delete/{{ $student->id }}" class="btn btn-danger" onclick="return confirm('You Are About To Delete Student.')"><span class="fa fa-trash fa-lg"></span></a></td>
                    <td><a href="update/{{ $student->id }}" class="btn btn-success"><span class="fa fa-edit fa-lg"></span></a></td>
                    <td><a href="sms/{{ $student->id }}" class="btn btn-primary"><span class="fa fa-phone fa-lg"></span></a></td>
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

@include("layouts.datatable")
<script type="text/javascript">
    $(function(){
            var table=$('#table').DataTable({
         dom: 'Bfrtip',
        columnDefs: [
            {
                targets: 1,
                className: 'noVis'
            }
        ],
      
         "columnDefs": [
            {
                "targets": [ 4,5,6,7,8 ],
                "visible": false,
                "searchable": true
            },
          
        ],
        lengthChange: true,
        buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]

    } );

});
       
</script>
