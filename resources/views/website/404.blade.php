@extends('layouts.website')
@section('title', '404 Not Found')
@section('content')
    <section class="page-404">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('website.home') }}" class="logo">
                        <img src="{{ asset('assets/website/images/logo.png') }}" alt="site logo" />
                    </a>
                    <h1>404</h1>
                    <h2>Page Not Found</h2>
                    <a href="{{ route('website.home') }}" class="btn btn-main"><i class="tf-ion-android-arrow-back"></i> Go
                        Home</a>
                    <p class="copyright mt-5 mb-0">Copyright
                        <script>
                            document.write(new Date().getFullYear())
                        </script> &copy; Designed & Developed by <a
                            href="https://www.themefisher.com">Themefisher</a>. All rights reserved.
                        <br> Get More <a href="https://themefisher.com/free-bootstrap-templates/">Free Bootstrap
                            Templates</a>
                </div>
            </div>
        </div>
    </section>
@endsection
