<div class="form-group">
    <label>{{$label}}</label>
    <select id="{{$id}}" name="{{$name}}" class="form-control" style="width: 100%;">
        @foreach ($elements as $element)
            <option value="{{$element->id}}" {{ $element->id == $selected->id ? 'selected':'' }}>{{$element->name}}</option>
        @endforeach
    </select>
</div>
