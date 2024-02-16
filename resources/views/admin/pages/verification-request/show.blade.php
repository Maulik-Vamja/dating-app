@extends('admin.layouts.app')

@push('breadcrumb')
{!! Breadcrumbs::render('verification_request_show', $user->custom_id) !!}
@endpush

@section('content')
<div class="container">
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon">
                    <i class="{{$icon}} text-primary"></i>
                </span>
                <h3 class="card-label text-uppercase">View {{ $custom_title }}</h3>
            </div>
            <div class="card-toolbar">
                <a href="{{ route('admin.verification-requests.index') }}"
                    class="btn btn-primary text-uppercase">Back</a>
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end">
                <div class="">
                    <button data-target-href="{{ route('admin.verification-requests.updateStatus') }}"
                        class="btn {{$user->is_document_verified == 'approved' ? 'btn-success' : 'btn-light'}} btn-hover-success btn-verification-status"
                        title="Approve" data-status="approved" data-escort_id={{$user->custom_id}}
                        @disabled($user->is_document_verified=='approved' ) data-page-source="view">
                        <i class="fas fa-check-circle"></i> {{$user->is_document_verified=='approved' ? 'Approved' :
                        'Approve'}}
                    </button>
                    <button data-target-href="{{ route('admin.verification-requests.updateStatus') }}"
                        data-status="rejected"
                        class="btn {{$user->is_document_verified=='rejected' ? 'btn-warning' : 'btn-light'}}  btn-hover-warning btn-verification-status"
                        title="Reject" data-escort_id={{$user->custom_id}}
                        @disabled($user->is_document_verified=='rejected' ) data-page-source="view">
                        <i class="far fa-times-circle"></i> {{$user->is_document_verified=='rejected' ? 'Rejected' :
                        'Reject'}}
                    </button>
                    <button data-target-href="{{ route('admin.verification-requests.updateStatus') }}"
                        data-status="spam" data-escort_id={{$user->custom_id}}
                        class="btn {{$user->is_document_verified == 'spam' ? 'btn-danger' : 'btn-light'}}
                        btn-hover-danger
                        btn-verification-status" title="Spam"
                        @disabled($user->is_document_verified=='spam') data-page-source="view">
                        <i class="fas fa-info-circle"></i> {{$user->is_document_verified=='rejected' ? 'Spammed' :
                        'Spam'}}
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between p-5">
                            <div class="">Passport/NID (Upper Side)</div>
                        </div>
                        @php
                        $user_uppar_side_document =
                        $user->documents->where('type','upper')->first();
                        @endphp
                        <div class="card-body">
                            <div class="border mb-3 rounded  " style="max-height: 220px; height: 220px;">
                                <img src={{ $user_uppar_side_document->document_file
                                ??
                                'https://as1.ftcdn.net/v2/jpg/02/96/05/52/1000_F_296055218_RXc721N9fSYIz3sEV7QALYquMVP31jdJ.jpg'
                                }}
                                alt="document_upper_side"
                                id="passport_nid_upper_side_placeholder"
                                style="width: 100%;height: 100%;object-fit:
                                cover;object-position:center">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        @php
                        $user_back_side_document =
                        $user->documents->where('type','back')->first();
                        @endphp
                        <div class="card-header d-flex justify-content-between p-5">
                            <div class="">Passport/NID (Back Side)</div>
                        </div>
                        <div class="card-body">
                            <div class="border mb-3 rounded" style="max-height: 220px; height: 220px;">
                                <img src="{{ $user_back_side_document->document_file
                                    ??
                                    'https://as1.ftcdn.net/v2/jpg/02/96/05/52/1000_F_296055218_RXc721N9fSYIz3sEV7QALYquMVP31jdJ.jpg'
                                    }}" alt="document_upper_side" id="passport_nid_back_side_placeholder"
                                    style="width: 100%;height: 100%;object-fit: cover;object-position:center">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        @php
                        $user_with_selfie_document =
                        $user->documents->where('type','with_selfie')->first();
                        @endphp
                        <div class="card-header d-flex justify-content-between p-5">
                            <div class="">Selfie with Id</div>

                        </div>
                        <div class="card-body">
                            <div class="border mb-3 rounded  " style="max-height: 220px; height: 220px;">
                                <img src={{ $user_with_selfie_document->document_file
                                ??
                                'https://as1.ftcdn.net/v2/jpg/02/96/05/52/1000_F_296055218_RXc721N9fSYIz3sEV7QALYquMVP31jdJ.jpg'
                                }}
                                alt="document_upper_side"
                                id="passport_nid_with_user_placeholder"
                                style="width: 100%;height: 100%;object-fit:
                                cover;object-position:center">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
        <!--end::Form-->
    </div>
</div>
@endsection

@push('extra-js')
<script>
    $(document).ready(function () {

    });
</script>
@endpush