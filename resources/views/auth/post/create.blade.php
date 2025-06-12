@extends('layouts.admin')
@section('title', 'Create Post')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Create Post </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.posts') }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Create Post</li>
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
                            <h4 class="card-title">create post form </h4>

                            <form class="forms-sample" method="POST" action="{{ route('auth.post.store') }}"
                                enctype="multipart/form-data">
                                @csrf


                                <div class="form-group">
                                    <label for="exampleInputName1">title</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                        name="title" value="{{ old('title') }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectCategory">Category</label>
                                    <select required class="form-select" id="exampleSelectCategory" name="category_id">
                                        <option disabled selected>Choose a Category</option>
                                        @isset($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea required class="form-control" id="summernote" rows="4" name="description">{{ old('description') }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectPublish">Status</label>
                                    <select class="form-select" id="exampleSelectPublish" name="is_published">
                                        <option disabled selected>Choose a Status</option>
                                        <option value="1" @selected(old('is_published') == 1)>Publish</option>
                                        <option value="0" @selected(old('is_published') == 0)>Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tags">Tags</label>
                                    <input type="text" name="tags" id="tags" class="form-control"
                                        placeholder="e.g. laravel,php,backend">
                                </div>
                                <div class="form-group">
                                    <label for="gallery_id">File upload</label>
                                    <input type="file" name="file" id="gallery_id" class="form-control">
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

        <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#summernote').summernote();
            });
        </script>


    @endsection
