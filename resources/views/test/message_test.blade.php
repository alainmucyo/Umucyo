<!DOCTYPE html>
<html>
<head>
    <title>Message Test</title>
</head>
<body>
    <form method="post" action="{{ url("message") }}">
        {{ csrf_field() }}
        <textarea name="body" id="" cols="30" rows="10"></textarea>
        <input name="id" value="{{ $id }}" type="hidden">
        <input type="submit">
    </form>
</body>
</html>