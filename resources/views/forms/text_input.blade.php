<div class="form-group">
    <label for="{{$label}}">{{$label}}</label>
    <input
        type="{{$type ?? 'text'}}"
        class="form-control"
        name="{{$name}}"
        id="{{$id}}"
        value="{{$value ?? ''}}"
        placeholder="{{ $placeholder }}">
</div>
