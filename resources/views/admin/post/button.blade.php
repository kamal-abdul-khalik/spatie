<div class="d-flex justify-content-between">
    @can('view_posts')
            <a href="{{ route('posts.edit', $post) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
        @can('delete_posts')
            <button type="button" name="delete" id="{{ $post->slug }}" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
        @endcan
    @endcan
</div>
