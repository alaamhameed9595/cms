@extends('layouts.admin')
@section('title', 'Edit Post')
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Edit Post </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.posts') }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Post</li>
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
                            <h4 class="card-title">Edit post form </h4>

                            <form class="forms-sample" method="post" action="{{ route('auth.post.update', $post->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="form-group">
                                    <label for="exampleInputName1">title</label>
                                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name"
                                        name="title" value="{{ $post->title }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectCategory">Category</label>
                                    <select required class="form-select" id="exampleSelectCategory" name="category_id">
                                        <option disabled selected>Choose a Category</option>
                                        @isset($categories)
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @selected($post->category_id == $category->id)>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        @endisset
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="summernote">Description</label>
                                    <textarea required class="form-control" id="summernote" rows="4" name="description"
                                        value="{!! $post->description !!}"> </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectPublish">Status</label>
                                    <select class="form-select" id="exampleSelectPublish" name="is_published">
                                        <option disabled selected>Choose a Status</option>
                                        <option value="1" @selected($post->is_published == 1)>Publish</option>
                                        <option value="0" @selected($post->is_published == 0)>Draft</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="gallery_id">File upload</label>
                                    @if (isset($post->gallery) && $post->gallery->image)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $post->gallery->image) }}" alt="Current Image"
                                                style="width: 100px; height: 100px; object-fit:cover;">
                                        </div>
                                    @endif
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
            $(function() {
                $('#summernote').summernote({
                    height: 200
                });
            });
        </script>
    @endsection
