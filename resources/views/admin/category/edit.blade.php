@extends('layouts.admin.app')

@section('css')
    <link rel="stylesheet" href="/assets/admin/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/assets/admin/modules/datatables/datatables.min.css">
@endsection

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Category : {{ $category->name }}</h1>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Edit Category</h4>
                            </div>
                            <div class="card-body">

                                <form action="{{ route('categories.update', $category) }}" method="post">

                                    @csrf
                                    @method('PUT')

                                    @include('admin.category.partials.form-controls')

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection
