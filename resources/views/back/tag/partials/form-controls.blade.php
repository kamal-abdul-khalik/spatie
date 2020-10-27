<input type="text" name="name" value="{{ old('name') ?? $tag->name }}" id="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off">
@error('name')
<div class="invalid-feedback">{{ $message }}</div>
@enderror

<div class="mt-3">
    <button type="submit" class="btn btn-sm btn-primary">{{ $submit }}</button>
</div>