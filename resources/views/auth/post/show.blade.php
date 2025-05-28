@extends('layouts.admin')
@section('title', 'Post')
@section('content')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> show Post </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.posts') }}">Posts</a></li>
                        <li class="breadcrumb-item active" aria-current="page">show Post</li>
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

                            <div class="form-group">
                                <label for="exampleInputName1">Title</label>
                                <input type="text" class="form-control" id="exampleInputName1" name="title"
                                    value="{{ old('title', $post->title ?? '') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectCategory">Category</label>
                                <h6 class="form-control" id="exampleSelectCategory">
                                    {{ $post->category->name ?? 'No Category' }}
                                </h6>
                            </div>
                            <div class="form-group">
                                <label for="summernote">Description</label>
                                <div class="form-control" style="min-height:120px; background:#f8f9fa;">
                                    {!! $post->description !!}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectPublish">Status</label>
                                <select class="form-select" id="exampleSelectPublish" name="is_published" disabled>
                                    <option disabled>Choose a Status</option>
                                    <option value="1" @selected(old('is_published', $post->is_published ?? '') == 1)>Publish
                                    </option>
                                    <option value="0" @selected(old('is_published', $post->is_published ?? '') == 0)>Draft
                                    </option>
                                </select>
                            </div>
                            <div class="image-preview">
                                <label for="image">Image</label>
                                <div class="image-container">
                                    @if ($post->gallery)
                                        <img src="{{ asset('storage/' . $post->getImageUrlAttribute()) }}" alt="Post Image"
                                            class="img-fluid">
                                    @else
                                        <p>No image available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
        @endsection
    @endsection
