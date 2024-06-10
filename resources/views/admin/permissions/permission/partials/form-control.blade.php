<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" value="{{ old('name') ?? $permission->name }}" name="name" class="form-control @error('name') is-invalid @enderror" autocomplete="off">
        @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Guard Name</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" value="{{ old('guard_name') ?? $permission->guard_name }}" name="guard_name" placeholder='default to "web"' id="name" id="guard_name" class="form-control">
        @error('guard_name')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="col-sm-12 col-md-7">
        <button type="submit" class="btn btn-primary btn-sm">{{ $submit }}</button>
    </div>
</div>