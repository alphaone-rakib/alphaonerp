@extends('layouts.master')
@section('title') @lang('Part Class')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Part Class') @endslot
        @slot('title') @lang('Edit Part Class')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('part-class.update', $partClass) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Part Class Edit Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="class_name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <select id="class_name" class="form-control select2 @error('class_name') is-invalid @enderror" name="class_name" required>
                                        <option value="">@lang('Select Part Class')</option>
                                        <option value="Alum" {{ old('class_name', $partClass->class_name) == 'Alum' ? 'selected' : '' }}> {{ __('Alum') }}</option>
                                        <option value="Aro" {{ old('class_name', $partClass->class_name) == 'Aro' ? 'selected' : '' }}> {{ __('Aro') }}</option>
                                        <option value="Cast" {{ old('class_name', $partClass->class_name) == 'Cast' ? 'selected' : '' }}> {{ __('Cast') }}</option>
                                        <option value="Comp" {{ old('class_name', $partClass->class_name) == 'Comp' ? 'selected' : '' }}> {{ __('Comp') }}</option>
                                        <option value="DF10" {{ old('class_name', $partClass->class_name) == 'DF10' ? 'selected' : '' }}> {{ __('DF10') }}</option>
                                        <option value="DF20" {{ old('class_name', $partClass->class_name) == 'DF20' ? 'selected' : '' }}> {{ __('DF20') }}</option>
                                        <option value="DF30" {{ old('class_name', $partClass->class_name) == 'DF30' ? 'selected' : '' }}> {{ __('DF30') }}</option>
                                        <option value="DY" {{ old('class_name', $partClass->class_name) == 'DY' ? 'selected' : '' }}> {{ __('DY') }}</option>
                                        <option value="Dairy" {{ old('class_name', $partClass->class_name) == 'Dairy' ? 'selected' : '' }}> {{ __('Dairy') }}</option>
                                        <option value="OFC" {{ old('class_name', $partClass->class_name) == 'OFC' ? 'selected' : '' }}> {{ __('OFC') }}</option>
                                    </select>
                                    @error('class_name')
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
                                    <label for="class_description" class="form-label">@lang('Description')</label>
                                    <select id="class_description" class="form-control select2 @error('class_description') is-invalid @enderror" name="class_description">
                                        <option value="">@lang('Select Description')</option>
                                        <option value="Aluminum" {{ old('class_description', $partClass->class_description) == 'Aluminum' ? 'selected' : '' }}> {{ __('Aluminum') }}</option>
                                        <option value="AeroSpace" {{ old('class_description', $partClass->class_description) == 'AeroSpace' ? 'selected' : '' }}> {{ __('AeroSpace') }}</option>
                                        <option value="Castings" {{ old('class_description', $partClass->class_description) == 'Castings' ? 'selected' : '' }}> {{ __('Castings') }}</option>
                                        <option value="Computer Components" {{ old('class_description', $partClass->class_description) == 'Computer Components' ? 'selected' : '' }}> {{ __('Computer Components') }}</option>
                                        <option value="Fashion" {{ old('class_description', $partClass->class_description) == 'Fashion' ? 'selected' : '' }}> {{ __('Fashion') }}</option>
                                        <option value="Fragrance" {{ old('class_description', $partClass->class_description) == 'Fragrance' ? 'selected' : '' }}> {{ __('Fragrance') }}</option>
                                        <option value="Liquour" {{ old('class_description', $partClass->class_description) == 'Liquour' ? 'selected' : '' }}> {{ __('Liquour') }}</option>
                                        <option value="Dairy" {{ old('class_description', $partClass->class_description) == 'Dairy' ? 'selected' : '' }}> {{ __('Dairy') }}</option>
                                        <option value="Office Suplies" {{ old('class_description', $partClass->class_description) == 'Office Suplies' ? 'selected' : '' }}> {{ __('Office Suplies') }}</option>
                                    </select>
                                    @error('class_description')
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
                                    <label for="class_buyer" class="form-label">@lang('Buyer') <b class="ambitious-crimson">*</b></label>
                                    <select id="class_buyer" class="form-control select2 @error('class_buyer') is-invalid @enderror" name="class_buyer" required>
                                        <option value="">@lang('Select Buyer')</option>
                                        @foreach($buyers as $value)
                                        <option value="{{ $value->id }}" {{ old('class_buyer', $partClass->class_buyer) == $value->id ? 'selected' : '' }} >{{ ucwords($value->f_name)." ".ucwords($value->l_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('Submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('Cancel')</a>
                    </div>
                </div>
            </form>
        </div>
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
