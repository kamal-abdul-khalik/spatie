<div class="d-flex justify-content-between">
    @can('view_posts')
        <a href="{{ route('posts.edit', $post) }}" class="btn btn-info btn-sm"><i class="far fa-edit"></i></a>
    @endcan
    @can('delete_posts')
        <button href="{{ route('posts.destroy', $post) }}" class="btn btn-danger btn-sm" id="delete">
            <i class="far fa-trash-alt"></i>
        </button>
    @endcan
</div>
<script>
    $('button#delete').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Hapus Data Ini?',
            text: "Perhatian data yang sudah di hapus tidak bisa di kembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                Swal.fire(
                    'Terhapus!',
                    'Data sudah terhapus.',
                    'success'
                )
            }
        })
    });
</script>
