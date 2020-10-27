@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/datatables.min.css') }}">
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

                                @include('back.tag.partials.form-controls')

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
                                                <a href="{{ route('tags.edit', $tag) }}" type="button" class="btn btn-sm btn-info"><i class="fa fa-pencil-alt"></i></a>
                                                <a href="{{ route('tags.destroy', $tag) }}" type="button" class="btn btn-sm btn-danger" onclick="event.preventDefault();document.getElementById('destroy').submit();"><i class="fa fa-trash"></i></a>
                                                <form id="destroy" action="{{ route('tags.destroy', $tag) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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

@push('jslib')
<!-- Page Specific JS File -->
<script src="{{ asset('assets/back/modules/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/back/modules/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/back/js/page/modules-datatables.js') }}"></script>
@endpush