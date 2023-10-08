@extends('layouts.master')
@section('title') @lang('translation.starter')  @endsection

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/dropzone/dropzone.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css')}}" type="text/css">
@endsection
@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Pages @endslot
        @slot('title') Starter  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">@lang('common.application configuration')</h4>
                </div>
                <form class="form-material form-horizontal" action="{{ route('application-settings.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="item_name" class="form-label">@lang('common.item name') <b class="ambitious-crimson">*</b></label>
                                    <input id="item_name"  class="form-control @error('email') is-invalid @enderror" type="text" name="item_name" value="{{ old('item_name') }}" placeholder="@lang('common.type your item name here')" required>
                                    @error('item_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="item_short_name" class="form-label">@lang('common.item short name') <b class="ambitious-crimson">*</b></label>
                                    <input id="item_short_name" class="form-control @error('item_short_name') is-invalid @enderror" type="text" name="item_short_name" value="{{ old('item_short_name') }}" placeholder="@lang('common.type your item short name here')" required>
                                    @error('item_short_name')
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
                                    <label for="company_name" class="form-label">@lang('common.company name') <b class="ambitious-crimson">*</b></label>
                                    <input id="company_name" class="form-control  @error('company_name') is-invalid @enderror" type="text" name="company_name" value="{{ old('company_name') }}" placeholder="@lang('common.type your company name here')" required>
                                    @error('company_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="company_email" class="form-label">@lang('common.company email') <b class="ambitious-crimson">*</b></label>
                                    <input id="company_email" class="form-control  @error('company_email') is-invalid @enderror" type="text" name="company_email" value="{{ old('company_email') }}" placeholder="@lang('common.type your company email here')" required>
                                    @error('company_email')
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
                                    <label for="language" class="form-label">@lang('common.default language') <b class="ambitious-crimson">*</b></label>
                                    <select id="language" class="form-control @error('company_email') is-invalid @enderror" data-choices name="language">
                                        @php
                                            $defaultLang = env('LOCALE_LANG', 'en');
                                        @endphp
                                        <option value="">@lang('common.select language')</option>
                                        @foreach($getLang as $key => $value)
                                            <option value="{{ $key }}" {{ old('language', $defaultLang) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('language')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="time_zone" class="form-label">@lang('common.time zone') <b class="ambitious-crimson">*</b></label>
                                    <select id="time_zone" class="form-control @error('company_email') is-invalid @enderror" data-choices name="time_zone">
                                        <option value="">@lang('common.select time zone')</option>
                                        @foreach($timezone as $key => $value)
                                        <option value="{{ $key }}" {{ old('time_zone') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('time_zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                <div class="card-body">



                        <div class="mb-3">
                            <label for="employeeName" class="form-label">@lang('common.company email')</label>
                            <input type="text" class="form-control" id="employeeName" placeholder="Enter emploree name">
                        </div>
                        <div class="mb-3">
                            <label for="time_zone" class="form-label">@lang('common.time zone')</label>
                            <select id="time_zone" class="">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="time_zone" class="form-label">@lang('common.company address')</label>
                            <textarea class="form-control" id="VertimeassageInput" rows="3" placeholder="Enter your message"></textarea>
                        </div>

                        <div class="mb-3">
                            <div class="card-body">
                                <p class="text-muted">DropzoneJS is an open source library that provides drag’n’drop file uploads
                                    with image previews.</p>

                                <div class="dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <!-- This is used as the file preview template -->
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="#"
                                                            alt="Dropzone-Image" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size></p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Leave</button>
                        </div>
                </div>
                <div class="card-footer">
                </div>
            </div>


        </div>
    </div>

@endsection

@section('script')
    <script src="{{ URL::asset('assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/pages/form-file-upload.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
