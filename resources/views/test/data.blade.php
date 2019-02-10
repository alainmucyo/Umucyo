@extends("layouts.master")
@section("body")
<table id="table" class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>LastName</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Alain</td>
        <td>Mucyo</td>
    </tr>
    </tbody>
</table>
<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection