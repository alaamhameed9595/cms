@extends('layouts.website')
@section('content')
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>Blog Destils</h1>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit. Nisi, quibusdam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post post-single">
                        <h2 class="post-title">{{ $post->title }}</h2>
                        <div class="post-meta mb-3">
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mr-4 align-middle">
                                    <i class="ion-calendar text-primary"></i>
                                    <span class="text-secondary small">{{ $post->created_at->diffForHumans() }}</span>
                                </li>
                                <li class="list-inline-item align-middle">
                                    <a href="{{ route('website.category', $post->category_id) }}"
                                        class="text-decoration-none">
                                        <i class="ion-pricetags text-success"></i>
                                        <span class="text-secondary small">{{ $post->category->name }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="post-thumb mb-4">
                            <img class="img-fluid rounded shadow-sm" style="max-height:400px;object-fit:cover;"
                                src="{{ $post->getImageUrlAttribute() }}" alt="">
                        </div>
                        <div class="post-content post-excerpt mb-4">
                            <p class="lead">{!! $post->description !!}</p>
                        </div>
                        <div class="post-comments">
                            @if ($post->comments() && $post->comments()->count() > 0)
                                <h5 class="d-flex align-items-center gap-2 text-muted">
                                    <i class="bi bi-chat-left-text-fill fs-5 text-primary"></i>
                                    <span>{{ $post->approvedComments()->count() }} Comments</span>
                                </h5>
                                <ul class="media-list comments-list m-bot-50 clearlist">
                                    @include('website.blog.comments.partials', [
                                        'post' => $post,
                                        'comments' => $post->approvedComments()->whereNull('parent_id')->get(),
                                    ])

                                </ul>
                            @else
                                <h3 class="post-sub-heading">No Comments Yet</h3>
                                <p>Be the first to comment on this post!</p>
                                @endelse
                            @endif
                        </div>
                        <div class="post-comments-form mt-5">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('comments.store', $post->id) }}" method="POST"
                                class="bg-light p-3 rounded shadow-sm">
                                @csrf
                                <div class="form-row align-items-center">
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="name" id="name"
                                            class="form-control form-control-sm" placeholder="Name *" maxlength="100"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="email" name="email" id="email"
                                            class="form-control form-control-sm" placeholder="Email *" maxlength="100"
                                            required>
                                    </div>
                                    <div class="col-md-4 mb-2">
                                        <input type="text" name="website" id="website"
                                            class="form-control form-control-sm" placeholder="Website" maxlength="100">
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <textarea name="body" id="body" class="form-control form-control-sm" rows="3"
                                            placeholder="Write a public comment..." maxlength="400" required style="resize:none;"></textarea>
                                    </div>
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="parent_id" value="">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-light border px-4 text-primary"
                                            style="font-weight:500;">Comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
