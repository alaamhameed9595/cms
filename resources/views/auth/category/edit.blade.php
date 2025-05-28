@extends('layouts.admin')
@section('title', 'Edit category')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> edit category </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.category') }}">categories</a></li>
                        @haspermission('create categories')
                            <li class="breadcrumb-item active" aria-current="page">Create category</li>
                        @endhaspermission
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $err)
                                        <li>{{ $err }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-body">
                            <h4 class="card-title">edit category form </h4>

                            <form class="forms-sample" method="post"
                                action="{{ route('auth.category.update', $category->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="exampleInputName1">name</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                        name="name" value="{{ $category->name }}" required>
                                </div>

                                <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @endsection
