@extends('layouts.master-without-nav')

<title>@lang('Reset Password') | @if(isset($applicationSetting->item_name)) {{ $applicationSetting->item_name }}  @else {{ "Alphaonerp" }} @endif</title>

@section('content')
<div class="auth-page-wrapper pt-5">
    <div class="auth-one-bg-position auth-one-bg"  id="auth-particles">
        <div class="bg-overlay"></div>
        <div class="shape">
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1440 120">
                <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
            </svg>
        </div>
    </div>
    <div class="auth-page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mt-sm-5 mb-4 text-white-50">
                        <p class="mt-5 fs-20 fw-medium">@if(isset($applicationSetting->item_short_name)) {{ $applicationSetting->item_short_name }}  @else {{ "ERP" }} @endif</p>
                        <p class="mt-3 fs-15 fw-medium"> @if(isset($applicationSetting->item_name)) {{ $applicationSetting->item_name }}  @else {{ "Alphaonerp" }} @endif</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mt-4">
                        <div class="card-body p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">@lang('Reset Password')</h5>
                                <p class="text-muted">@lang('Reset password with')  @if(isset($applicationSetting->item_name)) {{ $applicationSetting->item_name }}  @else {{ "Alphaonerp" }} @endif</p>
                            </div>
                            <div class="p-2 mt-4">
                                <form action="{{ route('reset.password.post') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">@lang('E-Mail Address') <b class="ambitious-crimson">*</b></label>
                                        <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="email" name="email" placeholder="@lang('Type Your Email Address')" required autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">@lang('Password') <b class="ambitious-crimson">*</b></label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" id="password" name="password" placeholder="@lang('Type Your New Password')" required>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password-confirm" class="form-label">@lang('Confirm Password') <b class="ambitious-crimson">*</b></label>
                                        <input type="password" class="form-control @error('password-confirm') is-invalid @enderror" value="{{ old('password-confirm') }}" id="password-confirm" name="password-confirm" placeholder="@lang('Type Your New Confirm Password')" required>
                                    </div>
                                    <div class="mt-4">
                                        <button class="btn btn-success w-100" type="submit">@lang('Reset Password')</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/libs/particles.js/particles.js.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/particles.app.js') }}"></script>
<script src="{{ URL::asset('assets/js/pages/password-addon.init.js') }}"></script>

@endsection