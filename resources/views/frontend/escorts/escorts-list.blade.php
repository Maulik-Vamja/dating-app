@extends('frontend.layouts.app')

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
                                <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
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
            {{-- <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/01.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/02.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/03.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/04.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/05.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/06.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="model-intro">
                    <div class="model-img"><img src="assets/images/allmedia/07.jpg" alt="img"></div>
                    <div class="model-info">
                        <h5>Model Name</h5>
                        <p class="short-desc">Together we’ll mend your heart</p>
                        <div class="city-availibity">
                            <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                        </div>
                        <p class="d-flex align-items-center text-capitalize"><span
                                class="availibity-members"></span>available</p>
                        <p class="main-short-info">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                            eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                            irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit
                            anim id est laborum.</p>
                    </div>
                </div>
            </div> --}}
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