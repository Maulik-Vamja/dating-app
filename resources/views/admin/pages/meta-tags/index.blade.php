@extends('admin.layouts.app')
@push('breadcrumb')
{!! Breadcrumbs::render('site_setting') !!}
@endpush
@section('content')
<div class="container">
    <form id="form_settings" role="form" method="POST" action="{{ route('admin.meta-tags.update') }}"
        enctype="multipart/form-data">
        @csrf
        <div class="card card-custom card-stretch">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="{{$icon}} text-primary"></i>
                    </span>
                    <h3 class="card-label text-uppercase">{{ $custom_title }}</h3>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="meta_tags">
                                Meta Tags: <span class="text-danger">*</span>
                            </label>
                            <div class="input-icon">
                                <textarea type="text" class="form-control" placeholder="Enter Your Meta Tag for SEO."
                                    name="meta_tags" id="meta_tags">
                                </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="{{ route('admin.dashboard.index') }}" type="button" class="btn btn-secondary">Cancel</a>
            </div>
        </div>


    </form>
</div>
@endsection