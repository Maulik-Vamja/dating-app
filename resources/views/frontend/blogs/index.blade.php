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
                    {{-- <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li> --}}
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
                @forelse ($blogs as $blog)
                <div class="col-xl-4 col-md-6 col-12">
                    <div class="blog__item">
                        <div class="blog__inner">
                            <div class="blog-thumb">
                                <img src="{{ \Storage::url($blog->image) }}" alt="blog-thumb" class="w-100"
                                    style="max-height:250px !important; height: 250px;">
                            </div>
                            <div class="blog__content px-3 py-4">
                                <a href="{{ route('blogs.show',$blog->slug) }}">
                                    <h3>{{ $blog->title }}</h3>
                                </a>
                                <div class="blog__metapost">
                                    <a href="#">{{ $blog->user->full_name }}</a>
                                    <a href="#">{{ Carbon\Carbon::parse($blog->created_at)->format('M d,Y') }}</a>
                                </div>
                                <p>{{ str_limit(strip_tags($blog->description), 100) }}</p>
                                <a href="{{ route('blogs.show',$blog->slug) }}" class="default-btn"><span>read
                                        more</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>
</div>
<!-- ================> Blog section end here <================== -->
@endsection