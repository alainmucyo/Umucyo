<div class="list-group">
    <a href="" class="list-group-item list-group-item-heading">Available Classes</a>
    @foreach($rooms as $room)
    <a href="?room_id={{ $room->id }}" class="list-group-item list-group-item-action">{{ $room->class }}</a>
        @endforeach
</div>