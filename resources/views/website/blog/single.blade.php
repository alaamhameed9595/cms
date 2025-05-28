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
                        <div class="post-meta">
                            <ul>
                                <li>
                                    <i class="ion-calendar"></i> {{ $post->created_at->format('d, M Y') }}
                                </li>
                                <li>
                                    <a href="{{ route('website.category', $post->category_id) }}"><i
                                            class="ion-pricetags"></i>
                                        {{ $post->category->name }}</a>
                                </li>

                            </ul>
                        </div>
                        <div class="post-thumb">
                            <img class="img-fluid" src="{{ asset('storage/' . $post->getImageUrlAttribute()) }}"
                                alt="">
                        </div>
                        <div class="post-content post-excerpt">
                            <p>{!! $post->description !!}</p>

                        </div>
                        <div class="post-comments">
                            <h3 class="post-sub-heading">10 Comments</h3>
                            <ul class="media-list comments-list m-bot-50 clearlist">
                                <!-- Comment Item start-->
                                <li class="media">
                                    <a class="pull-left" href="#!">
                                        <img class="media-object comment-avatar rounded-circle"
                                            src="{{ asset('assets/website/images/blog/avater-1.jpg') }}" alt=""
                                            width="50" height="50">
                                    </a>
                                    <div class="media-body">
                                        <div class="comment-info">
                                            <h4 class="comment-author">
                                                <a href="#!">Jonathon Andrew</a>
                                            </h4>
                                            <time>July 02, 2020, at 11:34</time>
                                            <a class="comment-button" href="#!"><i
                                                    class="tf-ion-chatbubbles"></i>Reply</a>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut
                                            ante eleifend eleifend.
                                        </p>
                                        <!--  second level Comment start-->
                                        <div class="media">
                                            <a class="pull-left" href="#!">
                                                <img class="media-object comment-avatar rounded-circle"
                                                    src="{{ asset('assets/website/images/blog/avater-2.jpg') }}"
                                                    alt="" width="50" height="50">
                                            </a>
                                            <div class="media-body">
                                                <div class="comment-info">
                                                    <h4 class="comment-author">
                                                        <a href="#!">Senorita</a>
                                                    </h4>
                                                    <time>July 02, 2020, at 11:34</time>
                                                    <a class="comment-button" href="#!"><i
                                                            class="tf-ion-chatbubbles"></i>Reply</a>
                                                </div>
                                                <p>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at
                                                    magna ut ante eleifend eleifend.
                                                </p>
                                                <!-- third level Comment start -->
                                                <div class="media">
                                                    <a class="pull-left" href="#!">
                                                        <img class="media-object comment-avatar rounded-circle"
                                                            src="{{ asset('assets/website/images/blog/avater-3.jpg') }}"
                                                            alt="" width="50" height="50">
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="comment-info">
                                                            <h4 class="comment-author">
                                                                <a href="#!">Senorita</a>
                                                            </h4>
                                                            <time>July 02, 2020, at 11:34</time>
                                                            <a class="comment-button" href="#!"><i
                                                                    class="tf-ion-chatbubbles"></i>Reply</a>
                                                        </div>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                                                            at magna ut ante eleifend eleifend.
                                                        </p>
                                                    </div>
                                                </div>
                                                <!-- third level Comment end -->
                                            </div>
                                        </div>
                                        <!-- second level Comment end -->
                                    </div>
                                </li>
                                <!-- End Comment Item -->

                                <!-- Comment Item start-->
                                <li class="media">
                                    <a class="pull-left" href="#!">
                                        <img class="media-object comment-avatar rounded-circle"
                                            src="{{ asset('assets/website/images/blog/avater-4.jpg') }}" alt=""
                                            width="50" height="50">
                                    </a>
                                    <div class="media-body">
                                        <div class="comment-info">
                                            <h4 class="comment-author">
                                                <a href="#!">Jonathon Andrew</a>
                                            </h4>
                                            <time>July 02, 2020, at 11:34</time>
                                            <a class="comment-button" href="#!"><i
                                                    class="tf-ion-chatbubbles"></i>Reply</a>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut
                                            ante eleifend eleifend.
                                        </p>
                                    </div>
                                </li>
                                <!-- End Comment Item -->

                                <!-- Comment Item start-->
                                <li class="media">
                                    <a class="pull-left" href="#!">
                                        <img class="media-object comment-avatar rounded-circle"
                                            src="{{ asset('assets/website/images/blog/avater-1.jpg') }}" alt=""
                                            width="50" height="50">
                                    </a>
                                    <div class="media-body">
                                        <div class="comment-info">
                                            <h4 class="comment-author">
                                                <a href="#!">Jonathon Andrew</a>
                                            </h4>
                                            <time>July 02, 2020, at 11:34</time>
                                            <a class="comment-button" href="#!"><i
                                                    class="tf-ion-chatbubbles"></i>Reply</a>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque at magna ut
                                            ante eleifend eleifend.
                                        </p>
                                    </div>
                                </li>
                                <!-- End Comment Item -->
                            </ul>
                        </div>
                        <div class="post-comments-form">
                            <h3 class="post-sub-heading">Leave You Comments</h3>
                            <form method="post" action="#!" id="form" role="form">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <!-- Name -->
                                        <input type="text" name="name" id="name" class=" form-control"
                                            placeholder="Name *" maxlength="100" required="">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <!-- Email -->
                                        <input type="email" name="email" id="email" class=" form-control"
                                            placeholder="Email *" maxlength="100" required="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <!-- Website -->
                                        <input type="text" name="website" id="website" class=" form-control"
                                            placeholder="Website" maxlength="100">
                                    </div>
                                    <!-- Comment -->
                                    <div class="form-group col-md-12">
                                        <textarea name="text" id="text" class=" form-control" rows="6" placeholder="Comment"
                                            maxlength="400"></textarea>
                                    </div>
                                    <!-- Send Button -->
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-main ">
                                            Send comment
                                        </button>
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
