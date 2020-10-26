<div class="form-group">
    <label for="name">Name</label>
    <input type="text" value="{{ old('name') ?? $permission->name }}" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off">
    @error('name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="guard_name">Guard Name</label>
    <input type="text" value="{{ old('guard_name') ?? $permission->guard_name }}" name="guard_name" placeholder='default to "web"' id="name" id="guard_name" class="form-control">
</div>
<button type="submit" class="btn btn-primary btn-sm">{{ $submit }}</button>