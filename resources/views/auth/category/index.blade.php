@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection
@section('title', 'categories')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">All categories</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.category') }}">categories</a></li>

                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            @haspermission('create categories')
                                <a href="{{ route('auth.category.create') }}" class="btn btn-primary btn-sm">Create category</a>
                            @endhaspermission
                            @if ($categories->count() > 0)
                                <h4 class="card-title">All categories</h4>

                                <table class="table" id="category_table">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>Created at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->created_at }}</td>
                                                <td>

                                                    <a href="{{ route('auth.category.show', $category->id) }}"
                                                        class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
                                                    </a>
                                                    @haspermission('edit categories')
                                                        <a href="{{ route('auth.category.edit', $category->id) }}"
                                                            class="btn btn-warning btn-sm"> <i class="fa fa-edit"></i></a>
                                                    @endhaspermission
                                                    @haspermission('delete categories')
                                                        <form action="{{ route('auth.category.destroy', $category->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @endhaspermission
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h4 class="card-title">No categories Found</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->

        <!-- main-panel ends -->
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#category_table').DataTable();
            });
        </script>
    @endsection
