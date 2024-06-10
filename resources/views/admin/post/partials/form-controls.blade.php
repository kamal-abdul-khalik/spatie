<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul <span class="text-danger">*</span></label>
    <div class="col-sm-12 col-md-7">
        <input type="text" name="title" value="{{ old('title') ?? $post->title }}" id="title"
            class="form-control @error('title') is-invalid @enderror" autocomplete="off">
        @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Isi <span class="text-danger">*</span></label>
    <div class="col-sm-12 col-md-7">
        <textarea id="content" name="content" class="post ">{{ old('content') ?? $post->content }}</textarea>
        @error('content')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
    <div class="col-sm-12 col-md-7">
        <div id="image-preview" class="image-preview">
            <label for="image-upload" id="image-label">Pili Gambar</label>
            <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                id="image-upload" />
            @error('thumbnail')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori <span
            class="text-danger">*</span></label>
    <div class="col-sm-12 col-md-7">
        <select name="category_id" id="category_id" class="form-control selectric">
            <option disabled selected>Pilih!</option>
            @foreach ($categories as $category)
                <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                    {{ $category->name }} </option>
            @endforeach
        </select>
        @error('category_id')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags <span class="text-danger">*</span></label>
    <div class="col-sm-12 col-md-7">
        <small class="text-muted">Silahkan pilih beberapa tag terkait dengan informasi ini</small>
        <select name="tags[]" id="tags" class="form-control selectric" multiple="">
            <option selected disabled></option>
            @foreach ($tags as $tag)
                <option {{ $post->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">
                    {{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

@if (Auth::user()->hasRole(['superadmin', 'admin']))
    <div class="form-group row mb-4">
        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
        <div class="col-sm-12 col-md-7">
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="publish" value="1" {{ $post->status == true ? 'checked' : '' }}
                    name="status" class="custom-control-input">
                <label class="custom-control-label" for="publish">Publish</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="draft" value="0" {{ $post->status == false ? 'checked' : '' }}
                    name="status" class="custom-control-input">
                <label class="custom-control-label" for="draft">Draft</label>
            </div>
        </div>
    </div>
@endif

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="col-sm-12 col-md-7">
        <button type="submit" class="btn btn-primary">{{ $button ?? 'Create' }}</button>
    </div>
</div>
