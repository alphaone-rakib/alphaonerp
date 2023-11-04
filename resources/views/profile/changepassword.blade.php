@extends('layouts.master')
@section('title') @lang('User')  @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('User') @endslot
        @slot('title') @lang('Change Password')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('profile.updatePassword') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Change Password')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="current-password" class="form-label">@lang('Current Password') <b class="ambitious-crimson">*</b></label>
                                    <input id="current-password"  class="form-control @error('current-password') is-invalid @enderror" type="password" name="current-password" value="{{ old('current-password') }}" placeholder="@lang('Type Your Current Password')" required>
                                    @error('current-password')
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
                                    <label for="new-password" class="form-label">@lang('New Password') <b class="ambitious-crimson">*</b></label>
                                    <input id="new-password" class="form-control @error('new-password') is-invalid @enderror" type="password" name="new-password" value="{{ old('new-password') }}" placeholder="@lang('Type Your New Password here')" required>
                                    <small class="form-text text-muted">@lang('6 Characters Long')</small>
                                    @error('new-password')
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
                                    <label for="new-password_confirmation" class="form-label">@lang('Confirm Password') <b class="ambitious-crimson">*</b></label>
                                    <input id="new-password_confirmation" class="form-control @error('new-password_confirmation') is-invalid @enderror" type="password" name="new-password_confirmation" value="{{ old('new-password_confirmation') }}" placeholder="@lang('Type Your Confirm Password Here')" required>
                                    @error('new-password_confirmation')
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
                        <a href="{{ route('dashboard') }}" class="btn btn-warning btn-lg float-end">@lang('common.cancel')</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
@endsection
