<label class="bmd-label-static">Select Lesson</label>
<select class="form-control" name="lesson" required>
    <optgroup label="Lessons">
        @foreach($lessons as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
        @endforeach
    </optgroup>
</select>
