@extends('layouts.website')
@section('title', 'Coming Soon')
@section('content')

    <section class="coming-soon text-center overly">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="block">
                        <h1>We Are<br>Creative Digital Agency</h1>
                        <p>We will be here soon. Please Stay in Touch</p>
                        <div class="count-down"></div>
                        <div class="social-media-icons mt-20">
                            <ul>
                                <li><a href="{{ config('settings.urls.facebook') }}"><i class="ion-social-facebook"></i></a>
                                </li>
                                <li><a href="{{ config('settings.urls.twitter') }}"><i class="ion-social-twitter"></i></a>
                                </li>
                                <li><a href="{{ config('settings.urls.linkedin') }}"><i class="ion-social-linkedin"></i></a>
                                </li>
                                <li><a href="{{ config('settings.urls.tiktok') }}"><i class="ion-social-tiktok"></i></a>
                                </li>
                                <li><a href="{{ config('settings.urls.pinterest') }}"><i
                                            class="ion-social-pinterest"></i></a></li>
                                <li><a href="{{ config('settings.urls.instgram') }}"><i
                                            class="ion-social-instagram"></i></a></li>
                            </ul>
                        </div>
                        <p class="copyright mb-0">Copyright
                            <script>
                                document.write(new Date().getFullYear())
                            </script> &copy; Designed & Developed by <a class="text-white"
                                href="http://www.themefisher.com">Themefisher</a>. All rights reserved.
                            <br> Get More <a class="text-white"
                                href="https://themefisher.com/free-bootstrap-templates/">Free Bootstrap
                                Templates</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
