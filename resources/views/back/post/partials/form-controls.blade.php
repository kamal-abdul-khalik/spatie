<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
    <div class="col-sm-12 col-md-7">
        <input type="text" name="title" value="{{ old('title') ?? $post->title }}" id="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off">
        @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
    <div class="col-sm-12 col-md-7">
        <select name="category_id" id="category_id" class="form-control selectric">
            <option disabled selected>Choose one!</option>
            @foreach ($categories as $category)
            <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}"> {{ $category->name }} </option>
            @endforeach
        </select>
        @error('category_id')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
    <div class="col-sm-12 col-md-7">
        <textarea id="content" name="content" class="summernote ">{{ old('content') ?? $post->content }}</textarea>
        @error('content')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Thumbnail</label>
    <div class="col-sm-12 col-md-7">
        <div id="image-preview" class="image-preview">
            <label for="image-upload" id="image-label">Choose File</label>
            <input type="file" name="thumbnail" id="image-upload" />
            @error('thumbnail')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    </div>
</div>

<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
    <div class="col-sm-12 col-md-7">
        <select name="tags[]" id="tags" class="form-control selectric" multiple="">
            @foreach ($tags as $tag)
            <option {{ $post->tags()->find($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
            @endforeach
        </select>
        @error('tags')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
    <div class="col-sm-12 col-md-7">
        <select name="status" value="{{ old('status') ?? $post->status }}" id="status" class="form-control selectric">
            <option value="" selected="">Status Post</option>
            <option {{ $post->status == 'Publish' ? 'selected' : '' }} value="Publish">Publish</option>
            <option {{ $post->status == 'Draft' ? 'selected' : '' }} value="Draft">Draft</option>
            <option {{ $post->status == 'Pending' ? 'selected' : '' }} value="Pending">Pending</option>
        </select>
        @error('status')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group row mb-4">
    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
    <div class="col-sm-12 col-md-7">
        <button type="submit" class="btn btn-primary">{{ $button ?? 'Create' }}</button>
    </div>
</div>