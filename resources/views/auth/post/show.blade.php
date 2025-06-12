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
                            <div class="row align-items-stretch">
                                <div class="col-md-4 mb-4 mb-md-0">
                                    <!-- Image -->
                                    <div class="image-preview h-100 d-flex align-items-center">
                                        <div
                                            class="image-container border rounded p-2 bg-light text-center shadow-sm w-100">
                                            @if ($post->gallery)
                                                <img src="{{ $post->getImageUrlAttribute() }}" alt="Post Image"
                                                    class="img-fluid rounded shadow"
                                                    style="max-height:200px;object-fit:cover;">
                                            @else
                                                <p class="text-muted" style="font-size:1rem;">No image available</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!-- Title -->
                                    <div class="form-group mb-4">
                                        <label class="font-weight-bold text-secondary" style="font-size:1rem;">Title</label>
                                        <div class="form-control-plaintext border-bottom pb-2 pl-0 mb-0 text-dark"
                                            style="font-size:1.1rem;">{{ $post->title }}</div>
                                    </div>
                                    <!-- Category -->
                                    <div class="form-group mb-4">
                                        <label class="font-weight-bold text-secondary"
                                            style="font-size:1rem;">Category</label>
                                        <div class="form-control-plaintext border-bottom pb-2 pl-0 text-info font-italic"
                                            style="font-size:1.1rem;">{{ $post->category->name ?? 'No Category' }}</div>
                                    </div>
                                    <!-- Description -->
                                    <div class="form-group mb-4">
                                        <label class="font-weight-bold text-secondary"
                                            style="font-size:1rem;">Description</label>
                                        <div class="form-control-plaintext border-bottom pb-2 pl-0 bg-light text-dark rounded shadow-sm"
                                            style="min-height:120px;font-size:1.1rem;">{!! $post->description !!}</div>
                                    </div>
                                    <!-- Status -->
                                    <div class="form-group mb-4">
                                        <label class="font-weight-bold text-secondary"
                                            style="font-size:1rem;">Status</label>
                                        <span class="badge badge-{{ $post->is_published ? 'success' : 'warning' }} ">
                                            {{ $post->is_published ? 'Published' : 'Draft' }} </span>
                                    </div>
                                    @if ($post->tags && $post->tags->count() > 0)

                                        <div class="form-group mb-4">
                                            @foreach ($post->tags as $tag)
                                                <a href="{{ route('auth.tag.posts', $tag->slug) }}"
                                                    class="badge bg-primary text-white">#{{ $tag->name }}</a>
                                            @endforeach

                                        </div>
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div>
                                <h5 class="font-weight-bold mb-3 text-secondary" style="font-size:1.1rem;">Comments</h5>
                                @if ($post->comments && $post->comments->count())
                                    <div class="row">
                                        @include('auth.post.comments.partials', [
                                            'post' => $post,
                                            'comments' => $post->comments->whereNull('parent_id'),
                                            'isAdmin' => true,
                                        ])
                                    </div>
                                @else
                                    <p class="text-muted" style="font-size:1rem;">No comments for this post.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
        @endsection
    @endsection
