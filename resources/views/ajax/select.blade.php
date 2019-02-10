
<div class="form-group">
    <label for="class">Select Class</label>
    <select name="class" id="class" class="form-control" required>
        <optgroup label="Available Classes">
            @foreach($classes as $class)
                <option value="{{ $class->id }}">{{ $class->class }}</option>
            @endforeach
        </optgroup>
    </select>
</div>
