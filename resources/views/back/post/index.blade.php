@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/datatables/datatables.min.css') }}">
@endsection

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Post</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4><a class="btn btn-sm btn-primary" href="{{ route('posts.create') }}">New Post</a></h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>Title</th>
                                        <th>Categories</th>
                                        <th>Tags</th>
                                        <th>Status</th>
                                        <th>Author</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $post)
                                    @can('view', $post)
                                    <tr>
                                        <td><img alt="image" src="{{ asset($post->takeImage) }}" class="rounded-square" width="60" data-toggle="tooltip" title="{{ $post->title }}"></td>
                                        <td>{{ $post->title }}
                                            <div class="table-links">
                                                <a href="#">View</a>
                                                <div class="bullet"></div>
                                                <a href="{{ route('posts.edit', $post) }}">Edit</a>
                                                <div class="bullet"></div>
                                                <a href="{{ route('posts.destroy', $post) }}" onclick="event.preventDefault();document.getElementById('destroy').submit();" class="text-danger">Trash</a>
                                                <form id="destroy" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </div>
                                        </td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->tags()->get()->implode('name', ', ') }}</td>
                                        <td>
                                            @if ($post->status == 'Draft')
                                            <div class="badge badge-danger">{{ $post->status }}</div>
                                            @elseif($post->status == 'Publish')
                                            <div class="badge badge-success">{{ $post->status }}</div>
                                            @else
                                            <div class="badge badge-warning">{{ $post->status }}</div>
                                            @endif
                                        </td>
                                        <td><img alt="image" src="{{ $post->user->gravatar() }}" class="avatar mr-2 avatar-sm" width="60" data-toggle="tooltip" title="{{ $post->user->name }}"></td>
                                    </tr>
                                    @endcan
                                    @endforeach
                                </tbody>
                            </table>
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