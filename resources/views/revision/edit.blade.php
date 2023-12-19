@extends('layouts.master')
@section('title') @lang('Revision')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Revision') @endslot
        @slot('title') @lang('Edit Revision')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('revision.update', $revision) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Revision Edit Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="revision_id" class="form-label">@lang('Revision Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="revision_id"  class="form-control @error('revision_id') is-invalid @enderror" type="text" name="revision_id" value="{{ old('revision_id', $revision->revision_id) }}" placeholder="@lang('Type Your Revision Id')" required>
                                    @error('revision_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="revision_name" class="form-label">@lang('Revision Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="revision_name"  class="form-control @error('revision_name') is-invalid @enderror" type="text" name="revision_name" value="{{ old('revision_name', $revision->revision_name) }}" placeholder="@lang('Type Your Revision Name')" required>
                                    @error('revision_name')
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
                                    <label for="effective_date" class="form-label">@lang('Effective Date') <b class="ambitious-crimson">*</b></label>
                                    <input id="effective_date"  class="form-control @error('effective_date') is-invalid @enderror" type="text" name="effective_date" value="{{ old('effective_date', $revision->effective_date) }}" placeholder="@lang('Type Your Effective Date')" required>
                                    @error('effective_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-check-info mb-3">
                                    <br><br>
                                    <input id="approved" class="form-check-input" type="checkbox" name="approved" value="{{ true }}" @if ($revision->approved == '1') checked @endif>
                                    <label for="approved" class="form-label">@lang('Approved')</label>
                                    @error('approved')
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
                                    <label for="revision_description" class="form-label">@lang('Description')</label>
                                    <textarea id="revision_description" class="form-control" name="revision_description" rows="3" placeholder="@lang('Type Your Description')">{{ $revision->revision_description }}</textarea>
                                    @error('revision_description')
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
            $("#effective_date").flatpickr({
                enableTime: false,
                dateFormat: "Y-m-d"
            });
        });
    </script>
@endsection