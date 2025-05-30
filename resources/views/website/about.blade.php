@extends('layouts.website')
@section('title', 'About Us')
@section('content')

    <section class="about section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ asset('assets/website/images/company/about.jpg') }}" alt="about us">
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="pl-0 pl-lg-4">
                        <h2>We strive to be the best and <br> make awesome work.</h2>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit. Eius enim, accusantium
                            repellat ex
                            autem numquam
                            iure officiis facere vitae itaque.</p>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit. Nam qui vel cupiditate
                            exercitationem,
                            ea fuga est
                            velit nulla culpa modi quis iste tempora non, suscipit repellendus labore voluptatem dicta amet?
                            Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit. Provident, neque!</p>
                        <a href="{{ route('website.contact') }}" class="btn btn-small">Download Company Profile</a>
                    </div>
                </div>
            </div>
            <div class="row counter-box text-center mt-50">
                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-flask-outline"></i>
                        <h4 class="count" data-count="349">0</h4>
                        <span>Completed Projects</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-flame-outline"></i>
                        <h4 class="count" data-count="35000">0</h4>
                        <span>Lines Of Code</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-pint-outline"></i>
                        <h4 class="count" data-count="70">0</h4>
                        <span>Satisfied Customer</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-wineglass-outline"></i>
                        <h4 class="count" data-count="10">0</h4>
                        <span>Awards Winner</span>
                    </div>
                </div>

                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-chatboxes-outline"></i>
                        <h4 class="count" data-count="30">0</h4>
                        <span>Satisfied Customer</span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-6 mt-4">
                    <div class="counter-item">
                        <i class="ion-ios-body-outline"></i>
                        <h4 class="count" data-count="15">0</h4>
                        <span>Awards Winner</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-feature bg-dark section dark-service">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>We are indepented Design & Development Agency</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="ion-ios-color-filter-outline"></i>
                        <h4>IOS App Development</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="ion-ios-unlocked-outline"></i>
                        <h4>App Secutity</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="ion-ios-game-controller-b-outline"></i>
                        <h4>Games Development</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="ion-ios-mic-outline"></i>
                        <h4>Animation and Editing</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="ion-ios-lightbulb-outline"></i>
                        <h4>UI/UX Design</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="service-item">
                        <i class="icon ion-coffee"></i>
                        <h4>Branding</h4>
                        <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday moments
                            become reflections, and ideas are given a place to breathe. Whether you're here for deep dives,
                            light reads, or just a spark of inspiration, there’s something waiting for you. So grab a
                            coffee, get comfy, and stay awhile — we’re just getting started.elit, sed do eiusmod tempor
                            incidid</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="testimonial-carousel text-center">
                        <div class="testimonial-slider owl-carousel">
                            <div>
                                <i class="ion-quote"></i>
                                <p>"This Company created an e-commerce site with the tools to make our business a success,
                                    with innovative
                                    ideas we feel that our site has unique elements that make us stand out from the crowd."
                                </p>
                                <div class="user">
                                    <img src="{{ asset('assets/website/images/item-img1.jpg') }}" alt="Pepole">
                                    <p><span>Rose Ray</span> CEO-Themefisher</p>
                                </div>
                            </div>
                            <div>
                                <i class="ion-quote"></i>
                                <p>"This Company created an e-commerce site with the tools to make our business a success,
                                    with innovative
                                    ideas we feel that our site has unique elements that make us stand out from the crowd."
                                </p>
                                <div class="user">
                                    <img src="{{ asset('assets/website/images/item-img1.jpg') }}" alt="Pepole">
                                    <p><span>Rose Ray</span> CEO-Themefisher</p>
                                </div>
                            </div>
                            <div>
                                <i class="ion-quote"></i>
                                <p>"This Company created an e-commerce site with the tools to make our business a success,
                                    with innovative
                                    ideas we feel that our site has unique elements that make us stand out from the crowd."
                                </p>
                                <div class="user">
                                    <img src="{{ asset('assets/website/images/item-img1.jpg') }}" alt="Pepole">
                                    <p><span>Rose Ray</span> CEO-Themefisher</p>
                                </div>
                            </div>
                            <div>
                                <i class="ion-quote"></i>
                                <p>"This Company created an e-commerce site with the tools to make our business a success,
                                    with innovative
                                    ideas we feel that our site has unique elements that make us stand out from the crowd."
                                </p>
                                <div class="user">
                                    <img src="{{ asset('assets/website/images/item-img1.jpg') }}" alt="Pepole">
                                    <p><span>Rose Ray</span> CEO-Themefisher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">
                    <div class="tabCommon">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="vision-tab" data-toggle="tab" href="#vision" role="tab"
                                    aria-controls="vision" aria-selected="true">Vision</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="mission-tab" data-toggle="tab" href="#mission" role="tab"
                                    aria-controls="mission" aria-selected="false">Mission</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="approch-tab" data-toggle="tab" href="#approch" role="tab"
                                    aria-controls="approch" aria-selected="false">Approach</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="vision" role="tabpanel"
                                aria-labelledby="vision-tab">
                                <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday
                                    moments become reflections, and ideas are given a place to breathe. Whether you're here
                                    for deep dives, light reads, or just a spark of inspiration, there’s something waiting
                                    for you. So grab a coffee, get comfy, and stay awhile — we’re just getting started.elit.
                                    Inventore nobis ducimus facere
                                    repellat
                                    harum, eius cupiditate, aliquam aut deserunt. Nemo illo ex impedit autem quod nobis
                                    architecto, velit
                                    quasi, aut voluptas porro natus. Fuga magnam perspiciatis fugit, placeat possimus
                                    officia non ducimus
                                    voluptatum aspernatur ad quidem neque accusantium repudiandae cupiditate nobis corporis,
                                    cum facere
                                    iusto, modi cumque consectetur saepe. Officia, molestiae tempore! Consequatur ipsa
                                    consequuntur saepe
                                    suscipit vero laudantium, mollitia, quaerat soluta nihil non tempore, quos dignissimos
                                    quasi ab officiis
                                    illum numquam quibusdam ducimus, veritatis ad. Quia, aliquid. Quaerat quos ducimus ipsam
                                    amet minus
                                    temporibus eos sequi alias hic nemo.</p>
                            </div>
                            <div class="tab-pane fade" id="mission" role="tabpanel" aria-labelledby="mission-tab">
                                <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday
                                    moments become reflections, and ideas are given a place to breathe. Whether you're here
                                    for deep dives, light reads, or just a spark of inspiration, there’s something waiting
                                    for you. So grab a coffee, get comfy, and stay awhile — we’re just getting started.elit.
                                    Inventore nobis ducimus facere
                                    repellat
                                    harum, eius cupiditate, aliquam aut deserunt. Nemo illo ex impedit autem quod nobis
                                    architecto, velit
                                    quasi, aut voluptas porro natus. Fuga magnam perspiciatis fugit, placeat possimus
                                    officia non ducimus
                                    voluptatum aspernatur ad quidem neque accusantium repudiandae cupiditate nobis corporis,
                                    cum facere
                                    iusto, modi cumque consectetur saepe. Officia, molestiae tempore! Consequatur ipsa
                                    consequuntur saepe
                                    suscipit vero laudantium, mollitia, quaerat soluta nihil non tempore, quos dignissimos
                                    quasi ab officiis
                                    illum numquam quibusdam ducimus, veritatis ad. Quia, aliquid. Quaerat quos ducimus ipsam
                                    amet minus
                                    temporibus eos sequi alias hic nemo.</p>
                            </div>
                            <div class="tab-pane fade" id="approch" role="tabpanel" aria-labelledby="approch-tab">
                                <p>Hey there, and welcome to the blog! This is where thoughts turn into stories, everyday
                                    moments become reflections, and ideas are given a place to breathe. Whether you're here
                                    for deep dives, light reads, or just a spark of inspiration, there’s something waiting
                                    for you. So grab a coffee, get comfy, and stay awhile — we’re just getting started.elit.
                                    Inventore nobis ducimus facere
                                    repellat
                                    harum, eius cupiditate, aliquam aut deserunt. Nemo illo ex impedit autem quod nobis
                                    architecto, velit
                                    quasi, aut voluptas porro natus. Fuga magnam perspiciatis fugit, placeat possimus
                                    officia non ducimus
                                    voluptatum aspernatur ad quidem neque accusantium repudiandae cupiditate nobis corporis,
                                    cum facere
                                    iusto, modi cumque consectetur saepe. Officia, molestiae tempore! Consequatur ipsa
                                    consequuntur saepe
                                    suscipit vero laudantium, mollitia, quaerat soluta nihil non tempore, quos dignissimos
                                    quasi ab officiis
                                    illum numquam quibusdam ducimus, veritatis ad. Quia, aliquid. Quaerat quos ducimus ipsam
                                    amet minus
                                    temporibus eos sequi alias hic nemo.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
