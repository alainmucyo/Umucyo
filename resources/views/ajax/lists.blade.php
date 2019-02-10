<div class="list-group">
    <a href="#" class="list-group-item list-group-item-info">
        Available Classes
    </a>
    @foreach($classes as $class)
        <a href="#" class="list-group-item list-group-item-action test " id="test" type="{{ $class->id }}" onclick="
                                         $.get('/students/class/'+$(this).attr('type'),function(data) {
                                             $('#main').html(data);

                                    });
                                         $('.test').removeClass('active');
                                         $(this).addClass('active');
                                    " >{{ $class->class }}</a>
        
    @endforeach
</div>
<script>
    $(function () {
        $("#test").addClass('active');
        $.get('/students/class/'+$("#test").attr('type'),function(data) {
            $("#main").html(data);
        });
    })
</script>
