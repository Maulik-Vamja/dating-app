@extends('frontend.layouts.app')

@section('seo-meta')
<title>Adult Entertrainer at {{ "United States" }}</title>
<meta name="description"
    content="Trusted and secure adult entertainers platform featuring at IFindYou, massage providers, and adult entertainers. Enjoy adult quality services. Sign up today!">
<meta name="description"
    content="For Birmingham Adult Entertrainer ifindyou is the best alternative to tryst and most popular platform site for Birmingham Escorts. Like megapersonal it is free directory site for Birmingham Escorts or Escorts in Birmingham." />
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
                                        <option value="male" {{ request()->gender == 'male' ? 'selected' : '' }}>Male
                                        </option>
                                        <option value="female" {{ request()->gender == 'female' ? 'selected' : ''
                                            }}>Female</option>
                                        <option value="non-binary" {{ request()->gender == 'non-binary' ? 'selected' :
                                            ''
                                            }}>Non Binary</option>
                                    </select>
                                </div>
                            </div>
                            <input type="hidden" name="min_age" id="min_age" value="{{ request()->min_age ?? 18 }}">
                            <input type="hidden" name="max_age" id="max_age" value="{{ request()->max_age ?? 40 }}">
                            <div class="col-md-3 col-12">
                                <label class="m-0">Age</label>
                                <div class="range-slider">
                                    <span class="rangeValues"></span>
                                    <input value="{{ request()->min_age ?? 18 }}" min="18" max="60" step="1"
                                        type="range">
                                    <input value="{{ request()->max_age ?? 18 }}" min="18" max="60" step="1"
                                        type="range">
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <label>Country</label>
                                <div class="banner__inputlist">
                                    <select id="country" name="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country->id }}" {{ request()->country == $country->id ?
                                            'selected' : ''}}>{{$country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @php
                            $states = \App\Models\State::where('country_id',request()->country)->get();
                            @endphp
                            <div class="col-md-3 col-12">
                                <label>State</label>
                                <div class="banner__inputlist">
                                    <select id="state" name="state">
                                        <option value="">Select State</option>
                                        @foreach ($states as $state)
                                        <option value="{{ $state->id }}" {{ request()->state == $state->id ?
                                            'selected' : ''}}>{{$state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <label>City</label>
                                <div class="banner__inputlist">
                                    <select id="city" name="city">
                                        @if (request()->city == '' && request()->state == '')
                                        <option value="">Select State First</option>
                                        @else
                                        <option value="">Select City</option>
                                        @foreach (\App\Models\City::where('state_id',request()->state)->get() as $city)
                                        <option value="{{ $city->id }}" {{ request()->city == $city->id ?
                                            'selected' : ''}}>{{$city->name }}</option>
                                        @endforeach
                                        @endif
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
                        <a
                            href="{{ $escorts->previousPageUrl() }}?gender={{request()->gender}}&min_age={{request()->min_age}}&max_age={{request()->max_age}}&country={{request()->country}}&state={{request()->state}}&city={{request()->city}}"><i
                                class="fas fa-chevron-left"></i></a>
                        @else
                        <a href="javascript:void(0)" class="disabled"><i class="fas fa-chevron-left"></i></a>
                        @endif
                    </li>

                    @for ($page = 1 ;$page <= $escorts->total() / $escorts->perPage(); $page++)
                        <li>
                            <a href="{{ $escorts->path() }}?page={{ $page }}&gender={{request()->gender}}&min_age={{request()->min_age}}&max_age={{request()->max_age}}&country={{request()->country}}&state={{request()->state}}&city={{request()->city}}"
                                class="{{ $escorts->currentPage() == $page ? 'active' : ''}}">{{
                                $page }}</a>
                        </li>

                        @endfor
                        <li>
                            @if ($escorts->hasMorePages() && !$escorts->onLastPage())
                            <a
                                href="{{ $escorts->nextPageUrl() }}&gender={{request()->gender}}&min_age={{request()->min_age}}&max_age={{request()->max_age}}&country={{request()->country}}&state={{request()->state}}&city={{request()->city}}"><i
                                    class="fas fa-chevron-right"></i></a>
                            @else
                            <a href="javascript:void(0)"><i class="fas fa-chevron-right"></i></a>
                            @endif
                        </li>
                </ul>
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