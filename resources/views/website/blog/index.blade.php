@extends('layouts.website')
@section('content')
    <section class="page-title bg-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1>Blogs</h1>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit. Nisi, quibusdam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @if (isset($posts) && $posts->count() > 0)
                        @foreach ($posts as $post)
                            <div class="post">
                                <div class="post-thumb">
                                    <a href="{{ route('website.post.show', $post) }}">
                                        <img class="img-fluid" src="{{ $post->getImageUrlAttribute() }}"
                                            alt="{{ $post->slug }}">
                                    </a>
                                </div>
                                <h3 class="post-title"><a
                                        href="{{ route('website.post.show', $post) }}">{{ $post->title }}</a></h3>
                                <div class="post-meta">
                                    <ul>
                                        <li>
                                            <i class="ion-calendar"></i>{{ $post->created_at->format('d, M Y') }}
                                        </li>
                                        <li>
                                            <a href="{{ route('website.home', $post->category_id) }}"><i
                                                    class="ion-folder text-warning"></i>
                                                {{ $post->category->name }}</a>
                                        </li>

                                    </ul>
                                </div>
                                <div class="post-content">
                                    <p>{!! Str::limit($post->description, 15) !!}</p> <a href="{{ route('website.post.show', $post) }}"
                                        class="btn btn-main">Read More</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-warning">
                            <strong>No posts available.</strong>
                        </div>
                    @endif
                </div>
                <div class="col-lg-4">
                    <div class="pl-0 pl-xl-4">
                        <aside class="sidebar pt-5 pt-lg-0 mt-5 mt-lg-0">
                            <!-- Widget Latest Posts -->
                            <div class="widget widget-latest-post">
                                <h4 class="widget-title">Latest Posts</h4>

                                @if (isset($latestPosts) && $latestPosts->count() > 0)
                                    @foreach ($latestPosts as $post)
                                        <div class="media">
                                            <a class="pull-left" href="{{ route('website.post.show', $post) }}">
                                                <img class="media-object" src="{{ $post->getImageUrlAttribute() }}"
                                                    alt="{{ $post->slug }}">
                                            </a>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a
                                                        href="{{ route('website.post.show', $post->id) }}">{{ $post->title }}</a>
                                                </h4>
                                                <p>{!! Str::limit($post->description, 15) !!}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No latest posts available.</p>
                                @endif


                            </div>
                            <!-- End Latest Posts -->

                            <!-- Widget Category -->
                            <div class="widget widget-category">
                                <h4 class="widget-title">Categories</h4>
                                @if (isset($categories) && $categories->count() > 0)
                                    <ul class="widget-category-list">
                                        @foreach ($categories as $category)
                                            <li><a
                                                    href="{{ route('website.home', $category->id) }}">{{ $category->name }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                @else
                                    <p>No categories available.</p>
                                @endif
                            </div> <!-- End category  -->

                            <!-- Widget Search -->
                            <div class="widget widget-search">
                                <h4 class="widget-title">Search</h4>
                                <form method="GET" action="{{ route('website.home') }}" class="mb-4">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Search posts..." value="{{ request('search') }}">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </form>
                                @if (isset($query) && $query)
                                    <div class="mb-3">
                                        <span class="badge bg-info text-dark">Search: "{{ $query }}"</span>
                                    </div>
                                @endif
                            </div>
                            <!-- End Search Widget -->

                        </aside>
                    </div>
                </div>


            </div>

            <nav aria-label="Page navigation example">
                {{ $posts->links() }}
            </nav>
        </div>
    </div>
@endsection
