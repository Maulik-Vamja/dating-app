<footer class="footer footer--style2">

    <div class="footer__top bg_img" style="background-image: url({{asset('frontend/assets/images/footer/bg.jpg')}})">
        {{-- <div class="footer__newsletter wow fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="row g-4 justify-content-center">
                    <div class="col-lg-6 col-12">
                        <div class="footer__newsletter--area">
                            <div class="footer__newsletter--title">
                                <h4>Newsletter Sign up</h4>
                            </div>
                            <div class="footer__newsletter--form">
                                <form action="#">
                                    <input type="email" placeholder="Your email address">
                                    <button type="submit" class="default-btn"><span>Subscribe</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="footer__newsletter--area justify-content-xxl-end">
                            <div class="footer__newsletter--title me-xl-4">
                                <h4>Join Community</h4>
                            </div>
                            <div class="footer__newsletter--social">
                                <ul>
                                    <li><a target="_blank" rel="nofollow"
                                            href="https://www.facebook.com/ifindyou.global"><i
                                                class="fa-brands fa-facebook"></i></a></li>
                                    <li><a target="_blank" rel="nofollow" href="https://twitter.com/iFindYouGlobal"><i
                                                class="fa-brands fa-twitter"></i></a></li>
                                    <li><a target="_blank" rel="nofollow" href="https://t.me/ifindyouco"><i
                                                class="fa-brands fa-telegram"></i></a></li>
                                    <li><a target="_blank" rel="nofollow"
                                            href="https://www.tumblr.com/ifindyouglobal"><i
                                                class="fa-brands fa-tumblr"></i></a></li>
                                    <li><a target="_blank" rel="nofollow" href="https://mewe.com/ifindyou.47"><i
                                                class="fa-brands fa-meetup"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="footer__toparea py-5 wow fadeInUp" data-wow-duration="1.5s">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-4 col-sm-6 col-12">
                        <div class="footer__item footer--about">
                            <div class="footer__inner">
                                <div class="footer__content">
                                    <div class="footer__content--title">
                                        <h4>About iFindYou.co</h4>
                                    </div>
                                    <div class="footer__content--desc">
                                        <p>Best platform to find Adult entertainers around the world. Just specify what
                                            you are looking for in the search and you can meet the one you desire.
                                        </p>
                                    </div>
                                    <div class="footer__content--info">
                                        <p>Now we 300 memebers Family</p>
                                    </div>
                                    <div class="footer__newsletter--social">
                                        <ul>
                                            <li><a target="_blank" rel="nofollow"
                                                    href="https://www.facebook.com/ifindyou.global"><i
                                                        class="fa-brands fa-facebook"></i></a></li>
                                            <li><a target="_blank" rel="nofollow"
                                                    href="https://twitter.com/iFindYouGlobal"><i
                                                        class="fa-brands fa-twitter"></i></a></li>
                                            <li><a target="_blank" rel="nofollow" href="https://t.me/ifindyouco"><i
                                                        class="fa-brands fa-telegram"></i></a></li>
                                            <li><a target="_blank" rel="nofollow"
                                                    href="https://www.tumblr.com/ifindyouglobal"><i
                                                        class="fa-brands fa-tumblr"></i></a></li>
                                            <li><a target="_blank" rel="nofollow" href="https://mewe.com/ifindyou.47"><i
                                                        class="fa-brands fa-meetup"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="footer__item footer--support">
                            <div class="footer__inner">
                                <div class="footer__content">
                                    <div class="footer__content--title">
                                        <h4>Menu</h4>
                                    </div>
                                    <div class="">
                                        {{-- <ul> --}}
                                            <div><a href="{{ route('welcome') }}">Home</a></div>
                                            <div><a href="{{ route('register') }}">Sign Up</a></div>
                                            <div><a href="{{ route('login') }}">Login</a></div>
                                            <div class=""><a href="">Backpage Alternatives</a></div>
                                            <div class=""><a href="">Megapersonal Alternatives</a></div>
                                            <div class=""><a href="">Private Delights Alternative</a></div>
                                            {{--
                                        </ul> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="footer__item footer--feature">
                            <div class="footer__inner">
                                <div class="footer__content">
                                    <div class="footer__content--title">
                                        <h4>BROWSE
                                        </h4>
                                    </div>
                                    <div class="">
                                        {{-- <ul>
                                            @foreach ($latest_escorts as $escort)
                                            @php
                                            $random_image = $escort->gallery_images()->inRandomOrder()->first();
                                            @endphp
                                            <li>
                                                <div class="thumb position-relative">
                                                    <img alt="{{ $escort->full_name }}"
                                                        src="{{ $random_image ? (filter_var($random_image->image, FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg') }}"
                                                        alt="member-img"
                                                        style="object-fit: cover; width:50px; height:50px;" />
                                                    @php
                                                    $today = \Carbon\Carbon::now()->format('l');
                                                    $availableOrNot = json_decode($escort->availibility,true);
                                                    @endphp
                                                    @if ($availableOrNot && array_key_exists($today,$availableOrNot))
                                                    <span class="feature__activity"></span>
                                                    @endif
                                                </div>
                                                <div class="content">
                                                    <a href="{{ route('get.escort',$escort->user_name) }}">
                                                        <h6>{{ $escort->full_name }}</h6>
                                                    </a>
                                                    @if ( $availableOrNot && array_key_exists($today,$availableOrNot))
                                                    <p>Active</p>
                                                    @endif
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul> --}}
                                        <div class=""><a href="{{ route('get.locations') }}">Locations</a></div>
                                        <div class=""><a href="">All Escorts</a></div>
                                        <div class=""><a href="">Ashley Madison vs iFindyou</a></div>
                                        <div class=""><a href="">Top 5 Adult Entertainer Platform</a></div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="footer__item footer--activity">
                            <div class="footer__inner">
                                <div class="footer__content">
                                    <div class="footer__content--title">
                                        <h4>RESOURCES</h4>
                                    </div>
                                    <div class="">
                                        {{-- <ul>
                                            @foreach ($recent_blogs as $blog)
                                            <li>
                                                <div class="thumb">
                                                    <a href="{{ route('blogs.show',$blog->slug) }}">
                                                        <img src="{{ filter_var($blog->image,FILTER_VALIDATE_URL) == false ? \Storage::url($blog->image) : $blog->image }} "
                                                            alt="dating thumb"></a>
                                                </div>
                                                <div class="content">
                                                    <a href="group-single.html">
                                                        <h6>{{ $blog->title }}</h6>
                                                    </a>
                                                    <p>{{ Carbon\Carbon::parse($blog->created_at)->format('F d,Y') }}
                                                    </p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul> --}}
                                        <div><a href="{{ route('blogs.index')}}">Blog</a></div>
                                        <div><a href="#">Escort Terms</a></div>
                                        <div><a href="#">IFindYou.co FAQ</a></div>
                                        <div><a href="#">Sex Work FAQ</a></div>
                                        <div class=""><a href="">Tinder vs iFindYou</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-6 col-12">
                        <div class="footer__item footer--activity">
                            <div class="footer__inner">
                                <div class="footer__content">
                                    <div class="footer__content--title">
                                        <h4>PLATEFORM</h4>
                                    </div>
                                    <div class="">
                                        {{-- <ul>
                                            @foreach ($recent_blogs as $blog)
                                            <li>
                                                <div class="thumb">
                                                    <a href="{{ route('blogs.show',$blog->slug) }}">
                                                        <img src="{{ filter_var($blog->image,FILTER_VALIDATE_URL) == false ? \Storage::url($blog->image) : $blog->image }} "
                                                            alt="dating thumb"></a>
                                                </div>
                                                <div class="content">
                                                    <a href="group-single.html">
                                                        <h6>{{ $blog->title }}</h6>
                                                    </a>
                                                    <p>{{ Carbon\Carbon::parse($blog->created_at)->format('F d,Y') }}
                                                    </p>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul> --}}
                                        <div><a href="#">Help / Support</a></div>
                                        <div><a href="{{ route('about-us') }}">About</a></div>
                                        <div><a href="#">Social</a></div>
                                        <div><a href="#">Terms</a></div>
                                        <div><a href="#">Privacy</a></div>
                                        <div><a href="#">Legal Notices</a></div>
                                        <div><a href="#">Anti-Exploitation Policy</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4 text-center">
                    @foreach ($top12CitiesOfUserRegistered as $city)
                    <div class="col-12 col-lg-3">
                        <a
                            href="{{ route('get.escorts.by.location',['country'=>strtolower(str_replace(' ','-',$city->country->iso2)),'state'=>strtolower(str_replace(' ','-',$city->state->name)),'city'=>strtolower(str_replace(' ','-',$city->name))]) }}">
                            {{ $city->name }} escorts
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="footer__bottom wow fadeInUp" data-wow-duration="1.5s">
        <div class="container">
            <div class="footer__content text-center">
                <p class="mb-0">All Rights Reserved &copy; <a href="/">iFindyou.co</a>
                </p>
            </div>
        </div>
    </div>
</footer>