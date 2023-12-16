@extends('layouts.master')
@section('title') @lang('Buyer')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Buyer') @endslot
        @slot('title') @lang('Edit Buyer')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('buyer.update', $buyer) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Buyer Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="buyer" class="form-label">@lang('Buyer')</label>
                                    <input id="buyer"  class="form-control @error('buyer') is-invalid @enderror" type="text" name="buyer" value="{{ old('buyer') }}" placeholder="@lang('Type Your First & Last Name')" readonly>
                                    @error('buyer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="f_name" class="form-label">@lang('First Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="f_name"  class="form-control @error('f_name') is-invalid @enderror" type="text" name="f_name" value="{{ old('f_name', $buyer->f_name) }}" placeholder="@lang('Type Your First Name')" required>
                                    @error('f_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="l_name" class="form-label">@lang('Last Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="l_name"  class="form-control @error('l_name') is-invalid @enderror" type="text" name="l_name" value="{{ old('l_name', $buyer->l_name) }}" placeholder="@lang('Type Your Last Name')" required>
                                    @error('l_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="person_contact" class="form-label">@lang('Person / Contact')</label>
                                    <input id="person_contact"  class="form-control @error('person_contact') is-invalid @enderror" type="text" name="person_contact" value="{{ old('person_contact', $buyer->person_contact) }}" placeholder="@lang('Type Your First & Last Name')" readonly>
                                    @error('person_contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="buyer_email" class="form-label">@lang('Email Address') <b class="ambitious-crimson">*</b></label>
                                    <input id="buyer_email"  class="form-control @error('buyer_email') is-invalid @enderror" type="email" name="buyer_email" value="{{ old('buyer_email', $buyer->buyer_email) }}" placeholder="@lang('Type Your Email Address')" required>
                                    @error('buyer_email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('Update')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.select2').select2();

            let fName = $("#f_name").val();
            let lName = $("#l_name").val();
            let fNameLetter =  fName.charAt(0);
            $("#buyer").val(fNameLetter+lName);

            $('#f_name').on('change', function() {
                let fName = $("#f_name").val();
                let lName = $("#l_name").val();
                let fNameLetter =  fName.charAt(0);

                $("#person_contact").val(fName+lName);
                $("#buyer").val(fNameLetter+lName);
            });

            $('#l_name').on('change', function() {

                let fName = $("#f_name").val();
                let lName = $("#l_name").val();
                let fNameLetter =  fName.charAt(0);
                $("#person_contact").val(fName+lName);
                $("#buyer").val(fNameLetter+lName);

            });
        });
    </script>
@endsection
