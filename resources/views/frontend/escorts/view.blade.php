{{-- @dd($similar_escorts) --}}

@extends('frontend.layouts.app')

@section('content')
<div class="member member--style2 padding-top padding-bottom">
    <div class="container">
        <div class="section__header style-2 text-center wow fadeInUp" data-wow-duration="1.5s">
            <h2>Most Popular Members</h2>
            <p>Learn from them and try to make it to this board. This will for sure boost you visibility and
                increase your chances to find you loved one.</p>
        </div>
        <div class="section__wrapper wow fadeInUp" data-wow-duration="1.5s">
            <ul class="nav nav-tabs member__tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="newest-tab" data-bs-toggle="tab" data-bs-target="#newest"
                        type="button" role="tab" aria-controls="newest" aria-selected="true">Newest Members</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="activemember-tab" data-bs-toggle="tab" data-bs-target="#activemember"
                        type="button" role="tab" aria-controls="activemember" aria-selected="false">Active
                        Members</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="popularmember-tab" data-bs-toggle="tab" data-bs-target="#popularmember"
                        type="button" role="tab" aria-controls="popularmember" aria-selected="false">Popular
                        Members</button>
                </li>
            </ul>

            <div class="tab-content mx-12-none" id="myTabContent">
                <div class="tab-pane fade show active" id="newest" role="tabpanel" aria-labelledby="newest-tab">
                    <div class="row g-0 justify-content-center">
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Smith Jhonson</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Arika Q Smith</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>William R Show</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Karolin Kuhn</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Tobias Wagner</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Amanda Rodrigues</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Barros Pereira</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Emily Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Alves Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Sousa Carvalho</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="activemember" role="tabpanel" aria-labelledby="activemember-tab">
                    <div class="row g-0 justify-content-center">
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Smith Jhonson</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Amanda Rodrigues</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Barros Pereira</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Emily Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Alves Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>

                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Arika Q Smith</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>William R Show</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Karolin Kuhn</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Tobias Wagner</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Sousa Carvalho</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="popularmember" role="tabpanel" aria-labelledby="popularmember-tab">
                    <div class="row g-0 justify-content-center">
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/04.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Karolin Kuhn</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/05.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Tobias Wagner</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/06.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Amanda Rodrigues</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/07.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Barros Pereira</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/08.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Emily Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/09.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Alves Fernandes</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/01.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Smith Jhonson</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity member__activity--ofline"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Arika Q Smith</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/03.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>William R Show</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                        <div class="member__item">
                            <div class="member__inner">
                                <div class="member__thumb">
                                    <img src="{{asset('frontend/assets/images/member/home2/02.jpg')}}" alt="member-img">
                                    <span class="member__activity"></span>
                                </div>
                                <div class="member__content">
                                    <a href="member-single.html">
                                        <h5>Sousa Carvalho</h5>
                                    </a>
                                    <p>registered 4 months, 1 week ago</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="members.html" class="default-btn"><span>See More Popular</span></a>
            </div>
        </div>
    </div>
</div>
@endsection