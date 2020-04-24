<div class="form-group">
    <label for="{{$label}}">{{$label}}</label>
    <div class="input-group">
        <div class="custom-file">
            <input type="file"
                    name="{{$name}}"
                    class="custom-file-input
                    @error ($name)
                    is-invalid
                    @enderror"
                    id="{{$id}}">
            <label class="custom-file-label" for="{{$label}}">Choose file</label>
        </div>
    </div>
    @error ($name)
    <span class="error invalid-feedback" style="display:block">{{$message}}</span>
    @enderror
</div>
