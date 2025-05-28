@extends('layouts.admin')
@section('title', 'Create category')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Create category </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.category') }}">categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create category</li>
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
                            <h4 class="card-title">create category form </h4>

                            <form class="forms-sample" method="post" action="{{ route('auth.category.store') }}"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                        name="name" value="{{ old('name') }}" required>
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
