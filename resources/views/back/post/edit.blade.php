@extends('layouts.back.app')

@section('css_lib')
<link rel="stylesheet" href="{{ asset('assets/back/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('assets/back/modules/jquery-selectric/selectric.css') }}">
@endsection

@section('content')

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="{{ route('posts.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Post</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="{{ route('posts.index') }}">Posts</a></div>
          <div class="breadcrumb-item">Edit Post</div>
        </div>
      </div>

      <div class="section-body">  
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Edit : {{ $post->title }}</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('posts.edit', $post) }}" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    @include('back.post.partials.form-controls')

                </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

@push('jslib')
<script src="{{ asset('assets/back/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/back/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/back/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('assets/back/js/page/features-post-create.js') }}"></script>
@endpush