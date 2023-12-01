@extends('layouts.master')
@section('title') @lang('Product Group')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Product Group') @endslot
        @slot('title') @lang('Create Product Group')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('product-group.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Customer Product Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="group_id" class="form-label">@lang('Group Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="group_id"  class="form-control @error('group_id') is-invalid @enderror" type="text" name="group_id" value="{{ old('group_id') }}" placeholder="@lang('Type Your Group Id')" required>
                                    @error('group_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="group_name" class="form-label">@lang('Group Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="group_name" class="form-control @error('group_name') is-invalid @enderror" type="text" name="group_name" value="{{ old('group_name') }}" placeholder="@lang('Type Your Group Name')" required>
                                    @error('group_name')
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
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Group Description')"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('common.submit')" class="btn btn-info btn-lg"/>
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
            });
        </script>
    @endsection