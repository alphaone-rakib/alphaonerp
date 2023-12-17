@extends('layouts.master')
@section('title') @lang('Bin')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Bin') @endslot
        @slot('title') @lang('Edit Bin')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('bin.update', $bin) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Bin Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Bin') <b class="ambitious-crimson">*</b></label>
                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $bin->name) }}" placeholder="@lang('Type Your Bin Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-info mb-3">
                                    <br><br>
                                    <input id="inactive" class="form-check-input" type="checkbox" name="inactive" value="{{ true }}" @if ($bin->inactive == '1') checked @endif>
                                    <label for="inactive" class="form-label">@lang('Inactive')</label>
                                    @error('inactive')
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
                                    <label for="zone" class="form-label">@lang('Zone') <b class="ambitious-crimson">*</b></label>
                                    <input id="zone"  class="form-control @error('zone') is-invalid @enderror" type="text" name="zone" value="{{ old('zone', $bin->zone) }}" placeholder="@lang('Type Your Bin zone')" required>
                                    @error('zone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-info mb-3">
                                    <br><br>
                                    <input id="non_nettable" class="form-check-input" type="checkbox" name="non_nettable" value="{{ true }}" @if ($bin->non_nettable == '1') checked @endif>
                                    <label for="non_nettable" class="form-label">@lang('Non-Nettable')</label>
                                    @error('non_nettable')
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
                                    <label for="squence" class="form-label">@lang('Squence') <b class="ambitious-crimson">*</b></label>
                                    <input id="squence"  class="form-control @error('squence') is-invalid @enderror" type="text" name="squence" value="{{ old('squence', $bin->squence) }}" placeholder="@lang('Type Your Bin Squence')" required>
                                    @error('squence')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-info mb-3">
                                    <br><br>
                                    <input id="portable" class="form-check-input" type="checkbox" name="portable" value="{{ true }}" @if ($bin->portable == '1') checked @endif>
                                    <label for="portable" class="form-label">@lang('Portable')</label>
                                    @error('portable')
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
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Description')">{{ $bin->description }}</textarea>
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
                        <input type="submit" value="@lang('Update')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
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