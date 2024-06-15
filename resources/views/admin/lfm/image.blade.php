@extends('layouts.admin.app')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Image Manager</h1>
            </div>

            <iframe src="/filemanager?type=image"
                style="width: 100%; height: 800px; overflow: hidden; border: none;"></iframe>
        </section>
    </div>
@endsection
