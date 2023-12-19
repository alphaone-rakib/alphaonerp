@extends('layouts.master')
@section('title') @lang('Warehouse')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Warehouse') @endslot
        @slot('title') @lang('Create Warehouse')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('warehouse.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Warehouse Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="warehouse_id" class="form-label">@lang('Warehouse') <b class="ambitious-crimson">*</b></label>
                                    <input id="warehouse_id"  class="form-control @error('warehouse_id') is-invalid @enderror" type="text" name="warehouse_id" value="{{ old('warehouse_id') }}" placeholder="@lang('Type Your Warehouse')" required>
                                    @error('warehouse_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('Type Your Warehouse Name')" required>
                                    @error('name')
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
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Description')"></textarea>
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
                                    <label for="address_one" class="form-label">@lang('Address One') <b class="ambitious-crimson">*</b></label>
                                    <input id="address_one"  class="form-control @error('address_one') is-invalid @enderror" type="text" name="address_one" value="{{ old('address_one') }}" placeholder="@lang('Type Your Address One')" required>
                                    @error('address_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="address_two" class="form-label">@lang('Address Two')</label>
                                    <input id="address_two"  class="form-control @error('address_two') is-invalid @enderror" type="text" name="address_two" value="{{ old('address_two') }}" placeholder="@lang('Type Your Address Two')">
                                    @error('address_two')
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
                                    <label for="country" class="form-label">@lang('Country') <b class="ambitious-crimson">*</b></label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror select2" name="country" required>
                                        <option value="">@lang('Select Country')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('country') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('country')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="state" class="form-label">@lang('State')<b class="ambitious-crimson">*</b></label>
                                    <select id="state" class="form-control @error('state') is-invalid @enderror select2" name="state" required>
                                        <option value="">@lang('Select State')</option>
                                    </select>
                                    @error('state')
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
                                    <label for="city" class="form-label">@lang('City')</label>
                                    <select id="city" class="form-control @error('city') is-invalid @enderror select2" name="city">
                                        <option value="">@lang('Select City')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('city') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('city')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="zip_code" class="form-label">@lang('Zip Code')</label>
                                    <input id="zip_code" class="form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" value="{{ old('zip_code') }}" placeholder="@lang('Type Your Zip Code')">
                                    @error('zip_code')
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
                                    <label for="manager_name" class="form-label">@lang('Manager Name')</label>
                                    <input id="manager_name" class="form-control @error('manager_name') is-invalid @enderror" type="text" name="manager_name" value="{{ old('manager_name') }}" placeholder="@lang('Type Your Manager Name')">
                                    @error('manager_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
@endsection
    
@section('script')
    <script src="{{ URL::asset('assets/dropify/dist/js/dropify.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ URL::asset('assets/js/app.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.select2').select2();

            $('#country').on('change', function(){
                var countryId = $(this).val();
                if(countryId){
                    $.ajax({
                        url: '{{ url('company/selectedStateData') }}',

                        type:"GET",
                        dataType: 'JSON',
                        data:{countryId:countryId},
                        success:function(html){
                            if(html){
                                $("#state").empty();
                                $("#city").empty();
                                $("#state").append('<option>{{ __('Select State') }}</option>');
                                $("#city").append('<option>{{ __('Select City') }}</option>');
                                $.each(html.states,function(key,value){
                                    $("#state").append('<option value="'+key+'">'+value+'</option>');
                                });
                                $.each(html.cities,function(key,value){
                                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                                });
                            }else{
                                $("#state").empty();
                                $("#city").empty();
                            }
                        }
                    });
                } else {
                    $('#state').html('<option value="">{{ __('Select Country First') }}</option>');
                    $('#city').html('<option value="">{{ __('Select State First') }}</option>');
                }
            });
        });
    </script>
@endsection