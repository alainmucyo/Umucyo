<div class="card">
    <div class="card-header">
        List Of Available Students
        
    </div><br><br>
    <div class="card-body">
    <table class="table table-striped" id="table" style="margin-top: 5%">
        <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Class</th>
            <th>Level</th>
            <th>Report</th>
        </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $i++ }}</td>
                <td><a href="/student/alone/{{ $student->id }}" style="color: black"> {{ $student->fname }}</a></td>
                <td>{{ $student->gender ? "Male": "Female" }}</td>
                <td>{{ $student->room->class }}</td>
                <td>{{ $student->room->level->name }}</td>
                <td><a href="/report/{{ $student->id }}" class="btn-sm btn btn-raised btn-info">Generate</a></td>
            
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script src="{{ asset("js/app.js") }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset("js/jquery.tabledit.js") }}"></script>
@include("layouts.datatable")
<script type="text/javascript">
    $(function(){
        $("#table").DataTable();
    });
</script>