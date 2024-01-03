@extends('admin.layouts.app')

@push('breadcrumb')
{!! Breadcrumbs::render('blog_create') !!}
@endpush

@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="fas fa-user-plus text-primary"></i>
                </span>
                <h3 class="card-label text-uppercase">ADD {{ $custom_title }}</h3>
            </div>
        </div>

        <!--begin::Form-->
        <form id="frmAddBlog" method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                {{-- First Name --}}
                <div class="form-group">
                    <label for="title"> Title: {!! $mend_sign !!}</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title') }}" placeholder="Enter Blog Title" autocomplete="title"
                        spellcheck="false" autocapitalize="sentences" tabindex="0" autofocus />
                    @if ($errors->has('title'))
                    <span class="help-block">
                        <strong class="form-text">{{ $errors->first('title') }}</strong>
                    </span>
                    @endif
                </div>


                {{-- <div class="form-group">
                    <label for="last_name"> Feature Image: {!! $mend_sign !!} </label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
                        name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name"
                        autocomplete="last_name" spellcheck="false" autocapitalize="sentences" tabindex="0" autofocus />
                    @if ($errors->has('last_name'))
                    <span class="help-block">
                        <strong class="form-text">{{ $errors->first('last_name') }}</strong>
                    </span>
                    @endif
                </div> --}}
                {{-- Featured Image --}}
                <div class="form-group row">
                    <label class="col-xl-2 col-lg-2 col-form-label ">Featured Image</label>
                    <div class="col-lg-9 col-xl-6">
                        <div class="image-input image-input-outline" id="kt_profile_avatar"
                            style="background-image: url({{ asset('assets/admin/images/default_profile.jpg')}})">
                            <div class="image-input-wrapper"
                                style="background-image:url({{ asset('assets/admin/images/default_profile.jpg')}})">
                            </div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="image" accept=".png, .jpg, .jpeg"
                                    data-error-container="#image_error_container" />
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                        </div>
                        <span class="form-text text-muted">Allowed file types: png, jpg, jpeg.</span>
                    </div>
                </div>
                <span id="image_error_container"></span>
                @error('image')
                <span class="help-block">
                    <strong class="form-text">{{ $errors->first('title') }}</strong>
                </span>
                @enderror
                {{-- Category --}}
                <div class="form-group">
                    <div class="row">
                        {{-- Category --}}
                        <div class="col-lg-6">
                            <label for="category"> Category: {!! $mend_sign !!}</label>
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror"
                                data-error-container="#category_error_container">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <span id="category_error_container"></span>
                            @error('category')
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('title') }}</strong>
                            </span>
                            @enderror
                        </div>
                        {{-- Tags --}}
                        <div class="col-lg-6">
                            <label for="tags"> Tags: {!! $mend_sign !!}</label>
                            <select name="tags[]" id="tags" class="form-control @error('tags') is-invalid @enderror"
                                multiple data-error-container="#tags_error_container">
                                <option value="">Select Tag</option>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <span id="tags_error_container"></span>
                            @error('tags')
                            <span class="help-block">
                                <strong class="form-text">{{ $errors->first('title') }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                </div>
                {{-- Description --}}
                <div class="form-group">
                    <label for="description">Description{!!$mend_sign!!}</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                        name="description" placeholder="Enter description" autocomplete="description"
                        spellcheck="true">{{ old('description') }}</textarea>
                    @error('description')
                    <span class="help-block">
                        <strong class="form-text">{{ $errors->first('title') }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary mr-2 text-uppercase"> Add {{ $custom_title }}</button>
                <a href="{{ route('admin.escorts.index') }}" class="btn btn-secondary text-uppercase">Cancel</a>
            </div>
        </form>
        <!--end::Form-->
    </div>
</div>
@endsection

@push('extra-js')
<script src="{{ asset('assets/js/pages/custom/profile/profile.js?v=7.0.5') }}"></script>
<script>
    $(document).ready(function() {
        var summernoteElement = $('#description');
        var imagePath = 'summernote/cms/image';
        summernoteElement.summernote({
                height: 300,
                callbacks: {
                    onImageUpload : function(files, editor, welEditable) {
                        for(var i = files.length - 1; i >= 0; i--) {
                                sendFile(files[i], this,imagePath);
                        }
                    },
                    onMediaDelete : function(target) {
                        deleteFile(target[0].src);
                    },
                }
        });
        $('#category').select2({
            placeholder: 'Select a Category',
            tags: true
        });
        $('#tags').select2({
            placeholder: 'Select a Tags',
            tags: true
        });
        $("#frmAddBlog").validate({
            rules: {
                title: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
                image: {
                    required: true,
                    accept: "image/*",
                },
                category: {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
                'tags[]': {
                    required: true,
                    not_empty: true,
                    minlength: 3,
                },
            },
            messages: {
                title: {
                    required: "@lang('validation.required', ['attribute' => 'Title'])",
                    not_empty: "@lang('validation.not_empty', ['attribute' => 'Title'])",
                    minlength: "@lang('validation.min.string', ['attribute' => 'Title', 'min' => 3])",
                },
                image: {
                    required: "@lang('validation.required', ['attribute' => 'Featured Image'])",
                },
                category: {
                    required: "@lang('validation.required', ['attribute' => 'Category'])",
                },
                'tags[]': {
                    required: "@lang('validation.required', ['attribute' => 'Tags'])",
                },
            },
            errorClass: 'invalid-feedback',
            errorElement: 'span',
            highlight: function(element) {
                $(element).addClass('is-invalid');
                $(element).siblings('label').addClass('text-danger'); // For Label
            },
            unhighlight: function(element) {
                $(element).removeClass('is-invalid');
                $(element).siblings('label').removeClass('text-danger'); // For Label
            },
            errorPlacement: function(error, element) {
                if (element.attr("data-error-container")) {
                    error.appendTo(element.attr("data-error-container"));
                } else {
                    error.insertAfter(element);
                }
            }
        });
        $('#frmAddBlog').submit(function() {
            if(summernoteElement.summernote('isEmpty')) {
                $('#description-error').remove();
                $('<span class="text-danger" id="description-error"><strong class="form-text">The description field is required.</strong></span>').insertAfter('.note-editor');
                event.preventDefault();
                return false;
            }else {
                if ($(this).valid()) {
                    addOverlay();
                    $("input[type=submit], input[type=button], button[type=submit]").prop("disabled", "disabled");
                    return true;
                } else {
                    return false;
                }
            }
        });
        $('form').each(function () {
            if ($(this).data('validator'))
                $(this).data('validator').settings.ignore = ".note-editor *";
        });
    });
</script>
@endpush