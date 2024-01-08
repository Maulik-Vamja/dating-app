@extends('frontend.layouts.app')

@section('content')

<!-- ================> Story section start here <================== -->
<div class="search-panel">
    <div class="container">
        <div class="group__bottom--area">
            <div class="group__bottom--head">
                <form action="{{ route('get.escorts') }}" method="GET">
                    @csrf
                    <div class="banner__list">
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <label>Looking for</label>
                                <div class="banner__inputlist">
                                    <select>
                                        <option>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female" selected>Female</option>
                                        <option value="others">Others</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <label>Age</label>
                                <div class="mt-2 cmn-range">
                                    <input type="range" value="18,25" multiple min="18" max="40" class="form-control">
                                    <ul class="range-list">
                                        <li>18</li>
                                        <li>40</li>
                                    </ul>
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
                            <div class="col-md-3 col-12">
                                <label>State</label>
                                <div class="banner__inputlist">
                                    <select id="state" name="state">
                                        <option value="select State"></option>
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
                <a href="{{ route('get.escort',$escort->user_name) }}">
                    <div class="model-intro">
                        <div class="model-img"><img
                                src="{{ $random_image ? Storage::url($random_image->image) : asset('frontend/assets/images/allmedia/01.jpg')}}"
                                alt="img"></div>
                        <div class="model-info">
                            <h5>{{ $escort->full_name }}</h5>
                            <p class="short-desc">{{ $escort->short_description }}</p>
                            <div class="city-availibity">
                                <p><i class="fa-solid fa-house"></i>Sarasota, FL, US</p>
                            </div>
                            @php
                            $today = Carbon\Carbon::now()->format('l');
                            $availableOrNot =
                            $escort->availability()->where('availibility->'.$today,true)->first();
                            @endphp
                            <p class="d-flex align-items-center text-capitalize"><span
                                    class="{{ $availableOrNot ? '' : 'not-avail'}} availibity-members"></span>available
                            </p>
                            <p class="main-short-info">{!! str_limit($escort->description,200) !!}</p>
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
</script>
@endpush