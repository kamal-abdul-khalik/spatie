@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/datatables/datatables.min.css">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tag</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Tag</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('tags.store') }}" method="post">
                                    @csrf

                                    @include('admin.tag.partials.form-controls')

                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>List Tag</h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-1">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th>Created At</th>
                                                <th>Act</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($tags as $index => $tag)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td>{{ $tag->name }}</td>
                                                    <td>{{ $tag->slug }}</td>
                                                    <td>{{ $tag->created_at->format('d F Y') }}</td>
                                                    <td>
                                                        <a href="{{ route('tags.edit', $tag) }}" type="button"
                                                            class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                        <button href="{{ route('tags.destroy', $tag) }}"
                                                            class="btn btn-danger btn-sm" id="delete"><i
                                                                class="far fa-trash-alt"></i></button>
                                                        <form method="post" id="deleteForm">
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit" value="Hapus" style="display:none">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('js')
    <!-- Page Specific JS File -->
    <script src="/assets/admin/modules/datatables/datatables.min.js"></script>
    <script src="/assets/admin/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/admin/modules/jquery-ui/jquery-ui.min.js"></script>
    <script src="/assets/admin/js/page/modules-datatables.js"></script>
    <script src="/sweetalert2/dist/sweetalert2.all.min.js"></script>z

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
@endpush
