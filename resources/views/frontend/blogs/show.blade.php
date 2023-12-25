@extends('frontend.layouts.app')

@section('content')
<!-- ================> Page Header section start here <================== -->
{{-- <div class="pageheader bg_img" style="background-image: url(assets/images/bg-img/pageheader.jpg);">
    <div class="container">
        <div class="pageheader__content text-center">
            <h2>Blog Details</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Single</li>
                </ol>
            </nav>
        </div>
    </div>
</div> --}}
<!-- ================> Page Header section end here <================== -->

<!-- ================> Blog section start here <================== -->
<div class="blog blog--style2 padding-top padding-bottom aside-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center pb-15">
                <div class="col-lg-9 col-12">
                    <article>
                        <div class="blog__item">
                            <div class="blog__inner">
                                <div class="blog__thumb">
                                    <img src="{{ $blog->image }}" alt="blog">
                                </div>
                                <div class="blog__content">
                                    <h2>{{ $blog->title }}</h2>
                                    <ul class="blog__date">
                                        <li><span><i
                                                    class="fa-solid fa-calendar-days"></i>{{Carbon\Carbon::parse($blog->created_at)->format('F
                                                d,Y h:i a')}}
                                            </span></li>
                                        <li><span><i class="fa-solid fa-user"></i><a href="#">{{ $blog->user->full_name
                                                    }}</a></span></li>
                                    </ul>
                                    <p>{!! $blog->description !!}</p>

                                    <div class="tags-area">
                                        <ul class="tags lab-ul justify-content-center">
                                            @foreach ($blog->tags as $tag)
                                            <li>
                                                <a href="#">{{ $tag->name }}</a>
                                            </li>
                                            @endforeach
                                            {{-- <li>
                                                <a href="#" class="active">NoneProfit</a>
                                            </li>
                                            <li>
                                                <a href="#">Admission</a>
                                            </li>
                                            <li>
                                                <a href="#">Exams</a>
                                            </li> --}}
                                        </ul>
                                        <ul class="share lab-ul justify-content-center">
                                            <li>
                                                <a href="#" class="facebook"><i class="fa-brands fa-facebook-f"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="dribble"><i class="fa-brands fa-dribbble"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="google"><i class="fa-brands fa-google"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="article-pagination">
                            @php
                            $prev_article = App\Models\Blog::where('id', '<', $blog->id)->orderBy('id',
                                'desc')->first();
                                $next_article = App\Models\Blog::where('id', '>', $blog->id)->orderBy('id',
                                'asc')->first();
                                @endphp
                                @if ($prev_article)
                                <div class="prev-article">
                                    <a href="{{ route('blogs.show',$prev_article->slug) }}"><i
                                            class="icofont-rounded-double-left"></i>Previous Article</a>
                                    <p>{{ $prev_article->title }}</p>
                                </div>
                                @endif
                                @if ($next_article)
                                <div class="next-article">
                                    <a href="{{ route('blogs.show',$next_article->slug) }}">Next Article <i
                                            class="icofont-rounded-double-right"></i></a>
                                    <p>{{ $next_article->title }}</p>
                                </div>
                                @endif
                        </div>

                        {{-- <div class="author">
                            <div class="author__thumb">
                                <img src="{{asset('frontend/assets/images/blog/author/01.jpg')}}" alt="author">
                            </div>
                            <div class="author__content">
                                <h6 class="mb-2">Rajib Ahmed</h6>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, ipsa autem
                                    reprehenderit dolorem necessitatibus numquam illo in commodi cum. Quidem odit neque
                                    laudantium sequi exercitationem quas aspernatur, dolores vero earum.</p>
                                <div class="social-media">
                                    <a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="#" class="behance"><i class="fa-brands fa-behance"></i></a>
                                    <a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
                                    <a href="#" class="vimeo"><i class="fa-brands fa-vimeo-v"></i></a>
                                    <a href="#" class="linkedin"><i class="fa-brands fa-linkedin-in"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="comments">
                            <h4 class="comment-title">02 Comment</h4>
                            <ul class="lab-ul comment-list">
                                <li class="comment">
                                    <div class="com-item">
                                        <div class="com-thumb">
                                            <img alt="" src="{{asset('frontend/assets/images/blog/author/02.jpg')}}"
                                                srcset="{{asset('frontend/assets/images/blog/author/02.jpg')}}">
                                        </div>
                                        <div class="com-content">
                                            <div class="com-title">
                                                <div class="com-title-meta">
                                                    <a href="member-single.html">Linsa Faith</a>
                                                    <span> January 5, 2022 at 12:41 pm </span>
                                                </div>
                                                <span class="reply">
                                                    <a class="comment-reply-link" href="#"><i
                                                            class="icofont-reply-all"></i>Reply</a>
                                                </span>
                                            </div>
                                            <p>The inner sanctuary, I throw myself down among the tall grass bye the
                                                trckli stream and, as I lie close to the earth</p>
                                        </div>
                                    </div>
                                    <ul class="lab-ul comment-list">
                                        <li class="comment">
                                            <div class="com-thumb">
                                                <img alt="" src="{{asset('frontend/assets/images/blog/author/03.jpg')}}"
                                                    srcset="{{asset('frontend/assets/images/blog/author/03.jpg')}}">
                                            </div>
                                            <div class="com-content">
                                                <div class="com-title">
                                                    <div class="com-title-meta">
                                                        <a href="member-single.html">James Jusse</a>
                                                        <span> January 5, 2022 at 12:41 pm </span>
                                                    </div>
                                                    <span class="reply">
                                                        <a class="comment-reply-link" href="#"><i
                                                                class="icofont-reply-all"></i>Reply</a>
                                                    </span>
                                                </div>
                                                <p>A wonderful serenity has taken possession of my entire soul, like
                                                    these sweet mornings spring which I enjoy with my whole heart </p>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        <div class="comment-respond">
                            <h4>Leave a Comment</h4>
                            <div class="add-comment">
                                <form action="#" class="comment-form">
                                    <input name="name" type="text" placeholder="Name*">
                                    <input name="email" type="text" placeholder="Email*">
                                    <input name="url" type="text" placeholder="Website*" class="w-100">
                                    <textarea name="comment" rows="7" placeholder="Type Here Your Comment*"></textarea>
                                    <button type="submit" class="default-btn reverse"><span>Send Comment</span></button>
                                </form>
                            </div>
                        </div> --}}
                    </article>
                </div>
                <div class="col-lg-3 col-md-7 col-12">
                    <aside>
                        {{-- <div class="widget widget-search">
                            <div class="widget-header">
                                <h5>Search keywords</h5>
                            </div>
                            <form action="https://demos.codexcoder.com/" class="search-wrapper">
                                <input type="text" placeholder="Search Here...">
                                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </form>
                        </div> --}}

                        <div class="widget widget-category">
                            <div class="widget-header">
                                <h5>Post Category</h5>
                            </div>
                            <ul class="lab-ul widget-wrapper list-bg-none">
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>{{ $blog->category->name
                                            }}</span><span>{{ $blog->category->posts->count() }}</span></a>
                                </li>
                                {{-- <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>Business</span><span>20</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>Creative</span><span>25</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>Inspiation</span><span>30</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>News</span><span>28</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>Photography</span><span>20</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-angles-right"></i>Smart</span><span>26</span></a>
                                </li> --}}
                            </ul>
                        </div>

                        <div class="widget widget-post">
                            <div class="widget-header">
                                <h5>Recent Post</h5>
                            </div>
                            <ul class="lab-ul widget-wrapper">
                                @foreach ($recent_blogs as $recent_blog)
                                <li class="d-flex flex-wrap justify-content-between">
                                    <div class="post-thumb">
                                        <a href="{{ route('blogs.show',$recent_blog->slug) }}"><img
                                                src="{{ asset($recent_blog->image)}}"
                                                alt="product"></a>
                                    </div>
                                    <div class="post-content ps-4">
                                        <a href="{{ route('blogs.show',$recent_blog->slug) }}">
                                            <h6>{{ $recent_blog->title }}</h6>
                                        </a>
                                        <p>{{ Carbon\Carbon::parse($recent_blog->created_at)->format('d F Y') }}</p>
                                    </div>
                                </li>
                                @endforeach
                                {{-- <li class="d-flex flex-wrap justify-content-between">
                                    <div class="post-thumb">
                                        <a href="blog-single.html"><img
                                                src="{{asset('frontend/assets/images/blog/p-post/02.jpg')}}"
                                                alt="product"></a>
                                    </div>
                                    <div class="post-content ps-4">
                                        <a href="blog-single.html">
                                            <h6>Boosting Social For NGO And Charities </h6>
                                        </a>
                                        <p>01 January 2022</p>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap justify-content-between">
                                    <div class="post-thumb">
                                        <a href="blog-single.html"><img
                                                src="{{asset('frontend/assets/images/blog/p-post/03.jpg')}}"
                                                alt="product"></a>
                                    </div>
                                    <div class="post-content ps-4">
                                        <a href="blog-single.html">
                                            <h6>Poor People’s Campaign Our Resources</h6>
                                        </a>
                                        <p>01 January 2022</p>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap justify-content-between">
                                    <div class="post-thumb">
                                        <a href="blog-single.html"><img
                                                src="{{asset('frontend/assets/images/blog/p-post/04.jpg')}}"
                                                alt="product"></a>
                                    </div>
                                    <div class="post-content ps-4">
                                        <a href="blog-single.html">
                                            <h6>Boosting Social For NGO And Charities</h6>
                                        </a>
                                        <p>01 January 2022</p>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>

                        {{-- <div class="widget widget-instagram">
                            <div class="widget-header">
                                <h5>Instagram</h5>
                            </div>
                            <ul class="lab-ul widget-wrapper d-flex flex-wrap justify-content-center">
                                <li><a href="{{asset('frontend/assets/images/instragram/01.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/01.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/02.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/02.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/03.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/03.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/04.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/04.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/05.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/05.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/06.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/06.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/07.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/07.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/08.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/08.jpg')}}"
                                            alt="instragram-img"></a></li>
                                <li><a href="{{asset('frontend/assets/images/instragram/09.jpg')}}"
                                        data-rel="lightcase"><img
                                            src="{{asset('frontend/assets/images/instragram/09.jpg')}}"
                                            alt="instragram-img"></a></li>
                            </ul>
                        </div> --}}

                        {{-- <div class="widget widget-archive">
                            <div class="widget-header">
                                <h5>Our Archive</h5>
                            </div>
                            <ul class="lab-ul widget-wrapper list-bg-none">
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>January</span><span>2022</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>February</span><span>2022</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>March</span><span>2019</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>August</span><span>2022</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>September</span><span>2017</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>October</span><span>2016</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>November</span><span>2014</span></a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex flex-wrap justify-content-between"><span><i
                                                class="fa-solid fa-calendar-days"></i>December</span><span>2013</span></a>
                                </li>
                            </ul>
                        </div> --}}

                        {{-- <div class="widget widget-tags">
                            <div class="widget-header">
                                <h5>Our Popular tags</h5>
                            </div>
                            <ul class="lab-ul widget-wrapper">
                                <li><a href="#">Food</a></li>
                                <li><a href="#">Love</a></li>
                                <li><a href="#">Ollya</a></li>
                                <li><a href="#">health</a></li>
                                <li><a href="#">Partner</a></li>
                                <li><a href="#">Man</a></li>
                                <li><a href="#">Male</a></li>
                                <li><a href="#">Date</a></li>
                                <li><a href="#">Women</a></li>
                            </ul>
                        </div> --}}
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ================> Blog section end here <================== -->
@endsection
