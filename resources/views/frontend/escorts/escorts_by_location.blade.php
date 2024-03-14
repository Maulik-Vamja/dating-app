@extends('frontend.layouts.app')

@section('seo-meta')


@section('seo-meta')
    @if ($country_name && !$state_name && !$city_name)
        <title>{{ strtoupper($country_name) }} backpage alternative | Ifindyou</title>
        <meta name="description" content="Find {{ strtoupper($country_name) }} escorts, call girls, escort services, independent escorts, and adult entertainers available 24/7 in Nevada with updated 2024 profiles." />
    @elseif ($country_name && $state_name && !$city_name)
        <title>Male & Female escorts in {{ ucfirst($state_name) }} -{{ strtoupper($country_name) }} | Adult Entertainment  {{ ucfirst($state_name) }}| Ifindyou</title>
        <meta name="description" content="Find {{ $state_name }} escorts, call girls, escort services, independent escorts, and adult entertainers available 24/7 in Nevada with updated 2024 profiles.">
     @elseif ($country_name && $state_name && $city_name)
        <title>{{ucfirst($city_name) }} Female & Male escorts - {{ ucfirst($state_name) }} - {{ strtoupper($country_name) }} | Adult Entertainment {{ $city_name }} - {{ $state_name }} - {{ strtoupper($country_name) }} | Ifindyou</title>
        <meta name="description" content="Find Escorts and adult providers and entertainers in  {{ ucfirst($city_name) }} - {{ ucfirst($state_name) }} -{{ strtoupper($country_name) }}. Search for {{ ucfirst($city_name) }} escorts on ifindyou, find the best incall and outcall escorts with photos, videos in  {{ ucfirst($city_name) }} today!">
       @else
        <title>Adult Entertainers at iFindYou</title>
        <meta name="description" content="Trusted and secure adult entertainers platform. Enjoy adult quality services. Sign up today!">
    @endif
    <link rel="canonical" href="{{ url()->current() }}" />
@endsection


@section('og-meta')
<meta property="og:type" content="website">
<!-- Dynamic OG meta tags -->
<meta property="og:title" content="Contact with Largest Adult Network Platform | IFindYou ">
<meta property="og:description"
    content="Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
<meta property="og:image" content="{{asset('frontend/og_images/home.jpg')}}">
<meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('content')

<!-- ================> Story section start here <================== -->
<div class="search-panel">
    <div class="container">
        <div class="group__bottom--area">
            <div class="group__bottom--head">
                <form action="{{ route('get.escorts') }}" method="GET" class="w-100">
                    <div class="banner__list">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label>Looking for</label>
                                <div class="banner__inputlist">
                                    <select name="gender" id="gender">
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="non-binary">Non Binary</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="min_age" id="min_age" value="18">
                            <input type="hidden" name="max_age" id="max_age" value="40">
                            <div class="col-md-3 col-12">
                                <label class="m-0">Age</label>
                                <div class="range-slider">
                                    <span class="rangeValues"></span>
                                    <input value="18" min="18" max="60" step="1" type="range">
                                    <input value="40" min="18" max="60" step="1" type="range">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <label>Country</label>
                                <div class="banner__inputlist">
                                    <select id="country" name="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries->toArray() as $country)
                                        <option value="{{ $country['id'] }}">{{$country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3 col-12">
                                <label>State</label>
                                <div class="banner__inputlist">
                                    <select id="state" name="state">
                                        <option value="">Select Country First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <label>City</label>
                                <div class="banner__inputlist">
                                    <select id="city" name="city">
                                        <option value="">Select State First</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="default-btn reverse d-block"><span>Find Your
                                            Partner</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ================> Story section end here <================== -->
<!-- ================> Avilable section start here <================== -->
<div class="avilable-search-area">
    <div class="container">

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
            @forelse ($escorts as $escort)
            <div class="col mb-4">
                @php
                $random_image = $escort->gallery_images()->inRandomOrder()->first();
                @endphp
                <a href="{{ route('get.escort',$escort->user_name) }}" class="w-100">
                    <div class="model-intro">
                        <div class="model-img">
                            <img src="{{$random_image ? (filter_var($random_image->image,FILTER_VALIDATE_URL) == false ? Storage::url($random_image->image) : $random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                                alt="img">
                        </div>
                        <div class="model-info">
                            <h5>{{ $escort->full_name }}</h5>
                            <p class="short-desc">{{ $escort->short_description }}</p>
                            <div class="city-availibity">
                                <p><i class="fa-solid fa-house"></i>{{ $escort->home_address?->city?->name }}, {{
                                    $escort->home_address?->state?->name }},
                                    {{ $escort->home_address?->country?->iso2 }}</p>
                            </div>
                            @php
                            $today = Carbon\Carbon::now()->format('l');

                            $availableOrNot = json_decode($escort->availibility,true);
                            @endphp
                            <p class="d-flex align-items-center text-capitalize"><span
                                    class="{{ isset($availableOrNot[$today]) ? '' : 'not-avail'}} availibity-members"></span>available
                            </p>
                            <p class="main-short-info">{{ str_limit(strip_tags($escort->description),200) }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @empty
            <h3 class="text-white">Oops.. No Escort Found...!!</h3>
            @endforelse
        </div>
        <div class="member__pagination mt-4">
            <div class="member__pagination--left">
                <p>Viewing {{ $escorts->firstItem() }} to {{ $escorts->lastItem() }} of {{ $escorts->total() }} Members
                </p>
            </div>
            {{-- {!! $escorts->links !!} --}}

            <div class="member__pagination--right">
                <ul class="default-pagination">
                    <li>
                        @if (!$escorts->onFirstPage())
                        <a href="{{ $escorts->previousPageUrl() }}"><i class="fas fa-chevron-left"></i></a>
                        @else
                        <a href="javascript:void(0)" class="disabled"><i class="fas fa-chevron-left"></i></a>
                        @endif
                    </li>

                    @for ($page = 1 ;$page <= $escorts->total() / $escorts->perPage(); $page++)
                        <li>
                            <a href="{{ $escorts->path() }}?page={{ $page }}"
                                class="{{ $escorts->currentPage() == $page ? 'active' : ''}}">{{ $page }}</a>
                        </li>
                        @endfor
                        <li>
                            @if ($escorts->hasMorePages() && !$escorts->onLastPage())
                            <a href="{{ $escorts->nextPageUrl() }}"><i class="fas fa-chevron-right"></i></a>
                            @else
                            <a href="javascript:void(0)"><i class="fas fa-chevron-right"></i></a>
                            @endif
                        </li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <!-- Your blog content goes here -->
                <div class="blog" style="color: white;">

            <h1 style="color: white;font-size: 2rem; margin-bottom: 10px;" class="h2">Your nearby Escorts Services in  {{ $location_name }}</h1>

<p>Are you searching for adult services in  {{ $location_name }}? Look no further! At iFindYou, we've categorized all services into two convenient sections: Adult and Dating. Our goal is to simplify your search so you can easily find the perfect service tailored to your needs.
Adult Jobs in  {{ $location_name }}</p>

<p>If you're seeking adult employment opportunities or looking to hire someone for adult work, our Adult Jobs section is here to assist you. Browse through our extensive job listings to find the perfect fit for you. With countless companies posting job opportunities, you'll have no trouble finding the job of your dreams. You can even post your own job listing if you're looking to hire.
Body Rubs: Discover personals and parlors in  {{ $location_name }} offering body rub services. Our platform makes it easy to find and book the service of your choice.
Remember to exercise caution and use your common sense to avoid scams.</p>

<p>Local Escorts in  {{ $location_name }}: Feeling lonely or in need of temporary companionship? Our Local Escorts section is your solution. Find verified escorts near you who are ready to provide companionship and entertainment. Take your time to research and choose the perfect companion for your needs.
TS Escorts: Explore the growing trend of TS escorts in  {{ $location_name }}. With numerous TS escorts available, you can select the right one to fulfill your desires. Our platform ensures that you find reputable and trustworthy TS escorts for your peace of mind.
In addition to these services, iFindYou.co also features a female escort directory, and a dating section for personal relationships. We prioritize your choices and ensure a seamless browsing experience without the distraction of flashy ads.</p>


                </div>
            </div>
        </div>
    </div>

</div>
<!-- ================> Avilable section End here <================== -->



@endsection

@push('frontend-extra-js')
<script>
    $(function() {
        jcf.replaceAll();
    });
    $(document).ready(function(){
        $('#country').on('change',function(){
            var country_id = $(this).val();
            $.ajax({
                url:"{{route('get.states')}}?country_id="+country_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#state").empty();
                    $("#state").append(`<option value="">Select State</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $("#state").append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $("#state").append(`<option value="">No State Available</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        });
        $('#state').on('change',function(){
            var state_id = $(this).val();
            $.ajax({
                url:"{{route('get.cities')}}?state_id="+state_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    $("#city").empty();
                    $("#city").append(`<option value="">Select City</option>`)
                    if(data.length > 0){
                        $.each(data,function(key,value){
                            $("#city").append(`<option value="${value.id}">${value.name}</option>`);
                        });
                    }else{
                        $("#city").append(`<option value="">No Cities Available Please Select another State.</option>`)
                    }
                },
                error:function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endpush
