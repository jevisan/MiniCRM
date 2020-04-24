<div class="form-group">
    <label for="{{$label}}">{{$label}}</label>
    <input
        type="{{$type ?? 'text'}}"
        class="form-control
        @error ($name)
        is-invalid
        @enderror"
        name="{{$name}}"
        id="{{$id}}"
        value="{{$value ?? old($name)}}"
        placeholder="{{ $placeholder }}">
        @error ($name)
        <span class="error invalid-feedback">{{$message}}</span>
        @enderror
</div>
