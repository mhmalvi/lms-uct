@extends('layouts.guest')

@section('content')
    <div class="mdk-box mdk-box--bg-white-35 bg-white js-mdk-box mb-0"
            data-effects="parallax-background blend-background">
        <div class="mdk-box__bg">
            <div class="mdk-box__bg-front"
                    style="background-image: url({{asset('assets/images/photodune-4161018-group-of-students-m.jpg')}});"></div>
        </div>
        <div class="mdk-box__content d-flex align-items-center justify-content-center container page__container text-center py-112pt" style="min-height: 656px;">
            <div class="card card--transparent mb-0 p-3 pt-5" style="width: 28rem">
                <h3 class="text-primary">We Are Happy To See You!</h3>
                <div class="card-body text-left">
                    <login-component></login-component>
                </div>
            </div>
        </div>
    </div>

    <div class="page-section border-bottom-2 bg-white">
        <div class="container page__container">
            <div class="page-headline text-center">
                <h2>Features</h2>
                <p class="lead measure-lead mx-auto text-70">What other students turned professionals have to say about us after learning with us and reaching their goals.</p>
            </div>

            <div class="row align-items-center">
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">subscriptions</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">8,000+ Courses</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">verified_user</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">By Industry Experts</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">update</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Unlimited Access</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">code</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Lesson Source Files</div>
                        <p class="card-subtitle text-70">Explore a wide range of skills.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center border-bottom border-md-0 mb-16pt mb-md-0 pb-16pt pb-md-0">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">layers</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Printed Diploma</div>
                        <p class="card-subtitle text-70">Professional development from the best people.</p>
                    </div>
                </div>
                <div class="d-flex col-md align-items-center">
                    <div class="rounded-circle bg-dark w-64 h-64 d-inline-flex align-items-center justify-content-center mr-16pt">
                        <i class="material-icons text-white">accessibility</i>
                    </div>
                    <div class="flex">
                        <div class="card-title mb-4pt">Premium Support</div>
                        <p class="card-subtitle text-70">Unlock Library and learn any topic with one subscription.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">
            <div class="page-separator">
                <div class="page-separator__text">Courses</div>
            </div>

            <home-course-list-component />
        </div>
    </div>

    <div class="page-section border-bottom-2">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">From the blog</div>
            </div>

            <div class="row card-group-row">

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/sketch_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_luke-porter-261779-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                            <div class="posts-card-popular__title card-body">
                                <small class="text-muted text-uppercase">sketch</small>
                                <a class="card-title"
                                    href="">Merge Duplicates Inconsistent Symbols</a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/invision_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_michael-dam-258165-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 col-lg-4 card-group-row__col">

                    <div class="card card--elevated posts-card-popular overlay card-group-row__card">
                        <img src="{{asset('assets/images/paths/photoshop_430x168.png')}}"
                                alt=""
                                class="card-img">
                        <div class="fullbleed bg-primary"
                                style="opacity: .5"></div>
                        <div class="posts-card-popular__content">
                            <div class="card-body d-flex align-items-center">
                                <div class="avatar-group flex">
                                    <div class="avatar avatar-xs"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Janell D.">
                                        <a href=""><img src="{{asset('assets/images/256_rsz_1andy-lee-642320-unsplash.jpg')}}"
                                                    alt="Avatar"
                                                    class="avatar-img rounded-circle"></a>
                                    </div>
                                </div>
                                <a style="text-decoration: none;"
                                    class="d-flex align-items-center"
                                    href=""><i class="material-icons mr-1"
                                        style="font-size: inherit;">remove_red_eye</i> <small>327</small></a>
                            </div>
                            <div class="posts-card-popular__title card-body">
                                <small class="text-muted text-uppercase">photoshop</small>
                                <a class="card-title"
                                    href="">Semantic Logo Design</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="page-section bg-alt">
        <div class="container page__container">

            <div class="page-separator">
                <div class="page-separator__text">Feedback</div>
            </div>

            <div class="row">

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-6 col-md-4">

                    <div class="card card-feedback card-body">
                        <blockquote class="blockquote mb-0">
                            <p class="text-70 small mb-0">A wonderful course on how to start. Eddie beautifully conveys all essentials of a becoming a good Angular developer. Very glad to have taken this course. Thank you Eddie Bryan.</p>
                        </blockquote>
                    </div>
                    <div class="media ml-12pt">
                        <div class="media-left mr-12pt">
                            <a href="student-profile.html"
                                class="avatar avatar-sm">
                                <!-- <img src="public/images/people/110/guy-.jpg')}}" width="40" alt="avatar" class="rounded-circle"> -->
                                <span class="avatar-title rounded-circle">UK</span>
                            </a>
                        </div>
                        <div class="media-body media-middle">
                            <a href="student-profile.html"
                                class="card-title">Umberto Kass</a>
                            <div class="rating mt-4pt">
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star</span></span>
                                <span class="rating__item"><span class="material-icons">star_border</span></span>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection
