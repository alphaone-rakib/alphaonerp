@extends('layouts.master')
@section('title') @lang('Production Calendar')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Production Calendar') @endslot
        @slot('title') @lang('Create Production Calendar')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('production-calendar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Production Calendar Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="production_calendar_id" class="form-label">@lang('Production Calendar Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="production_calendar_id"  class="form-control @error('production_calendar_id') is-invalid @enderror" type="text" name="production_calendar_id" value="{{ old('production_calendar_id') }}" placeholder="@lang('Type Your Production Calendar Id')" required>
                                    @error('production_calendar_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="production_calendar_name" class="form-label">@lang('Production Calendar Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="production_calendar_name" class="form-control @error('production_calendar_name') is-invalid @enderror" type="text" name="production_calendar_name" value="{{ old('production_calendar_name') }}" placeholder="@lang('Type Your Production Calendar Name')" required>
                                    @error('production_calendar_name')
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
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Production Calendar Description')"></textarea>
                                    @error('description')
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
                                    <label for="production_calendar_start" class="form-label">@lang('Start') <b class="ambitious-crimson">*</b></label>
                                    <select id="production_calendar_start" class="form-control @error('production_calendar_start') is-invalid @enderror select2" name="production_calendar_start" required>
                                        <option value="">@lang('Select Start')</option>
                                        @foreach($months as $key => $value)
                                        <option value="{{ $key }}" {{ old('production_calendar_start') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('production_calendar_start')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="production_calendar_end" class="form-label">@lang('End') <b class="ambitious-crimson">*</b></label>
                                    <select id="production_calendar_end" class="form-control @error('production_calendar_end') is-invalid @enderror select2" name="production_calendar_end" required>
                                        <option value="">@lang('Select Start')</option>
                                        @foreach($months as $key => $value)
                                        <option value="{{ $key }}" {{ old('production_calendar_end') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('production_calendar_end')
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
                                    <label for="work_per_week" class="form-label">@lang('Company Work / Per Week')</label>
                                    <select id="work_per_week" class="form-control @error('work_per_week') is-invalid @enderror select2" name="work_per_week" required>
                                        <option value="24_7">@lang('24 hours a day & 7 days a week')</option>
                                        <option value="10_5">@lang('10 hours a day & 5 days a week')</option>
                                    </select>
                                    @error('work_per_week')
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
