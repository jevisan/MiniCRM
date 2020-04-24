<div class="form-group">
    <label>{{$label}}</label>
    <select id="{{$id}}" name="{{$name}}" class="form-control" style="width: 100%;">
        <option value="0">-</option>
        @foreach ($elements as $element)
            <option value="{{$element->id}}" {{ isset($selected) && $element->id == $selected->id ? 'selected':'' }}>{{$element->name}}</option>
        @endforeach
    </select>
</div>
