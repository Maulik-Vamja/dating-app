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
                            <div class="d-flex justify-content-between statusActionButtonContainer  ">
                                @if ($user_uppar_side_document->status == 'approved')
                                <button class="btn btn-success btn-status-action w-100" disabled>Approved</button>
                                @elseif ($user_uppar_side_document->status == 'rejected')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Rejected</button>
                                @elseif ($user_uppar_side_document->status == 'spam')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Spammed/Fraud</button>
                                @else
                                <button class="btn btn-success btn-status-action" data-status="approved"
                                    data-document_id={{$user_uppar_side_document->custom_id}}>Approve</button>
                                <button class="btn btn-danger btn-status-action " data-status="rejected"
                                    data-document_id={{$user_uppar_side_document->custom_id}}>Reject</button>
                                <button class="btn btn-danger btn-status-action" data-status="spam"
                                    data-document_id={{$user_uppar_side_document->custom_id}}>Spam</button>
                                @endif
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
                            <div class="d-flex justify-content-between statusActionButtonContainer">
                                @if ($user_back_side_document->status == 'approved')
                                <button class="btn btn-success btn-status-action w-100" disabled>Approved</button>
                                @elseif ($user_back_side_document->status == 'rejected')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Rejected</button>
                                @elseif ($user_back_side_document->status == 'spam')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Spammed/Fraud</button>
                                @else
                                <button class="btn btn-success btn-status-action" data-status="approved"
                                    data-document_id={{$user_back_side_document->custom_id}}>Approve</button>
                                <button class="btn btn-danger btn-status-action " data-status="rejected"
                                    data-document_id={{$user_back_side_document->custom_id}}>Reject</button>
                                <button class="btn btn-danger btn-status-action" data-status="spam"
                                    data-document_id={{$user_back_side_document->custom_id}}>Spam</button>
                                @endif
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
                            <div class="d-flex justify-content-between statusActionButtonContainer">
                                @if ($user_with_selfie_document->status == 'approved')
                                <button class="btn btn-success btn-status-action w-100" disabled>Approved</button>
                                @elseif ($user_with_selfie_document->status == 'rejected')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Rejected</button>
                                @elseif ($user_with_selfie_document->status == 'spam')
                                <button class="btn btn-danger btn-status-action w-100" disabled>Spammed/Fraud</button>
                                @else
                                <button class="btn btn-success btn-status-action" data-status="approved"
                                    data-document_id={{$user_with_selfie_document->custom_id}}>Approve</button>
                                <button class="btn btn-danger btn-status-action " data-status="rejected"
                                    data-document_id={{$user_with_selfie_document->custom_id}}>Reject</button>
                                <button class="btn btn-danger btn-status-action" data-status="spam"
                                    data-document_id={{$user_with_selfie_document->custom_id}}>Spam</button>
                                @endif
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
        $(document).on('click','.btn-status-action',function (e) {
            e.preventDefault();
            var element = $(this);
            var status = $(this).data('status');
            var document_id = $(this).data('document_id');
            var url = "{{ route('admin.verification-requests.updateStatus') }}";
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    _token: "{{ csrf_token() }}",
                    status: status,
                    document_id: document_id
                },
                success: function (response) {
                    toastr.success(response.message);
                    $(element).siblings().remove();
                    $(element).text(response.statusText);
                    $(element).addClass('w-100');
                    $(element).attr('disabled',true);
                    if(response.is_user_verified == true){
                        window.location.href = "{{ route('admin.verification-requests.index') }}";
                    }
                },
                error: function (error) {
                    toastr.error(error.responseJSON.message);
                }
            });
        });
    });
</script>
@endpush
