@extends('layouts.admin')
@section('title', 'category')

@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> show category </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.category') }}">categories</a></li>
                        <li class="breadcrumb-item active" aria-current="page">show category</li>
                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="card-title"> </h4>



                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <p type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                    name="">{{ $category->name }}</p>
                            </div>


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
