@extends('frontend.layouts.app')

@section('content')
<!-- ================> Page Header section start here <================== -->
<div class="pageheader bg_img"
    style="background-image: url({{asset('frontend/assets/images/bg-img/pageheader.jpg')}});">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2>Our Blog Posts</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- ================> Page Header section end here <================== -->

<!-- ================> Blog section start here <================== -->
<div class="blog padding-top padding-bottom">
    <div class="container">
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center">
                {{-- <div class="col-12">
                    <div class="blog__item">
                        <div class="blog__inner d-flex flex-wrap align-items-center">
                            <div class="blog__thumb w-xl-50 w-100">
                                <img src="assets/images/blog/03.jpg" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content p-4 ps-xl-5 w-xl-50 w-100">
                                <a href="blog-single.html">
                                    <h3>Dramatically procrastinate extensive testing procedures.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Uniquely conceptuaze visionary process ariwith tactical ramatica centered qualitys
                                    vectoris with outofthebox scenario is ompelling uthoritatively generate front-end
                                    niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="assets/images/blog/01.jpg" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Compellingly productivate innovative niches rather.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Uniquely conceptuaze visionary process ariwith tactical ramatica centered qualitys
                                    vectoris with outofthebox scenario is ompelling uthoritatively generate front-end
                                    niches after one</p>
                                <a href="blog-single.html" class="default-btn reverse"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="assets/images/blog/02.jpg" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Enthusiastically pursue cross functional systems.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Uniquely conceptuaze visionary process ariwith tactical ramatica centered qualitys
                                    vectoris with outofthebox scenario is ompelling uthoritatively generate front-end
                                    niches after one</p>
                                <a href="blog-single.html" class="default-btn reverse"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog-thumb">
                                <img src="{{asset('frontend/assets/images/blog/04.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Distinctively synthesize goal-oriente.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/05.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Distinct edeine resour for ramatica.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/06.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Compellingly pontificate low-risk.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/07.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Efficiently recaptiualize impactful.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/08.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Appropriately donate in extensible.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/09.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Monotonectally with coordinate flexible.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/09.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Monotonectally with coordinate flexible.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/09.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Monotonectally with coordinate flexible.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog__thumb">
                                <img src="{{asset('frontend/assets/images/blog/09.jpg')}}" alt="blog-thumb" class="w-100">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="blog-single.html">
                                    <h3>Monotonectally with coordinate flexible.</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">Admin</a>
                                    <a href="#">01 January 2022</a>
                                </div>
                                <p>Unique proces ariwith tactica ramatica centered quatys vectoris with scenario
                                    front-end niches after one</p>
                                <a href="blog-single.html" class="default-btn"><span>read more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> Blog section end here <================== -->
@endsection
