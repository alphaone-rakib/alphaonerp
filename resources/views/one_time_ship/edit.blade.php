@extends('layouts.master')
@section('title') @lang('One Time Ship To')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('One Time Ship To') @endslot
        @slot('title') @lang('Edit One Time Ship To')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('one-time-ship-to.update', $oneTimeShipTo) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('One Time Ship To')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="contact" class="form-label">@lang('Contact') <b class="ambitious-crimson">*</b></label>
                                    <input id="contact"  class="form-control @error('contact') is-invalid @enderror" type="text" name="contact" value="{{ old('contact', $oneTimeShipTo->contact) }}" placeholder="@lang('Type Your Contact')" required>
                                    @error('contact')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name', $oneTimeShipTo->name) }}" placeholder="@lang('Type Your Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="save_as" class="form-label">@lang('Save as')</label>
                                    <input id="save_as"  class="form-control @error('save_as') is-invalid @enderror" type="text" name="save_as" value="{{ old('save_as', $oneTimeShipTo->save_as) }}" placeholder="@lang('Save as')">
                                    @error('save_as')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="address_one" class="form-label">@lang('Address One')</label>
                                    <input id="address_one"  class="form-control @error('address_one') is-invalid @enderror" type="text" name="address_one" value="{{ old('address_one', $oneTimeShipTo->address_one) }}" placeholder="@lang('Type Your Address One')">
                                    @error('address_one')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <div class="mb-2">
                                        <label for="customer_id" class="form-label">@lang('Customers')</label>
                                        <select id="customer_id" class="form-control @error('customer_id') is-invalid @enderror select2" name="customer_id">
                                            <option value="">@lang('Select Customer')</option>
                                            @foreach($customers as $key => $value)
                                            <option value="{{ $key }}" {{ old('customer_id', $oneTimeShipTo->customer_id) == $key ? 'selected' : '' }} >{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('customer_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="address_two" class="form-label">@lang('Address Two')</label>
                                    <input id="address_two"  class="form-control @error('address_two') is-invalid @enderror" type="text" name="address_two" value="{{ old('address_two', $oneTimeShipTo->address_two) }}" placeholder="@lang('Type Your Address Two')">
                                    @error('address_two')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="ship_to" class="form-label">@lang('Ship To')</label>
                                    <input id="ship_to"  class="form-control @error('ship_to') is-invalid @enderror" type="text" name="ship_to" value="{{ old('ship_to',$oneTimeShipTo->ship_to) }}" placeholder="@lang('Type Your Ship To')">
                                    @error('ship_to')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="country" class="form-label">@lang('Country')</label>
                                    <select id="country" class="form-control @error('country') is-invalid @enderror select2" name="country">
                                        <option value="">@lang('Select Country')</option>
                                        @foreach($countriesList as $key => $value)
                                        <option value="{{ $key }}" {{ old('country',$oneTimeShipTo->country) == $key ? 'selected' : '' }} >{{ $value }}</option>
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
                                <div class="mb-2">
                                    <label for="state" class="form-label">@lang('State')</label>
                                    <select id="state" class="form-control @error('state') is-invalid @enderror select2" name="state">
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
                                <div class="mb-2">
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
                                <div class="mb-2">
                                    <label for="postal_code" class="form-label">@lang('Postal Code')</label>
                                    <input id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" type="text" name="postal_code" value="{{ old('postal_code', $oneTimeShipTo->postal_code) }}" placeholder="@lang('Type Your Postal Code')">
                                    @error('postal_code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="phone" class="form-label">@lang('Phone')</label>
                                    <input id="phone" class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone', $oneTimeShipTo->phone) }}" placeholder="@lang('Type Your Phone Number')">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="fax" class="form-label">@lang('Fax')</label>
                                    <input id="fax" class="form-control @error('fax') is-invalid @enderror" type="text" name="fax" value="{{ old('fax', $oneTimeShipTo->fax) }}" placeholder="@lang('Type Your Fax Address')">
                                    @error('fax')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="tax_id" class="form-label">@lang('Tax Id')</label>
                                    <input id="tax_id" class="form-control @error('tax_id') is-invalid @enderror" type="text" name="tax_id" value="{{ old('tax_id', $oneTimeShipTo->tax_id) }}" placeholder="@lang('Type Your Tax Id')">
                                    @error('tax_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <label for="tax_liability" class="form-label">@lang('Tax Liability')</label>
                                    <input id="tax_liability" class="form-control @error('tax_liability') is-invalid @enderror" type="text" name="tax_liability" value="{{ old('tax_liability', $oneTimeShipTo->tax_liability) }}" placeholder="@lang('Type Your Tax Liability')">
                                    @error('tax_liability')
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

            var countryId = $("#country").val();
            let selectState = {{ $oneTimeShipTo->state ? $oneTimeShipTo->state : '2336' }};
            let selectCity = {{ $oneTimeShipTo->city ? $oneTimeShipTo->city : '48615' }};
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
                            $("#state").append('<option value="">{{ __('Select State') }}</option>');
                            $("#city").append('<option value="">{{ __('Select City') }}</option>');
                            $.each(html.states,function(key,value){
                                if (key == selectState) {
                                    $("#state").append('<option selected="selected" value="' + key + '">' + value + '</option>');
                                } else {
                                    $("#state").append('<option value="' + key + '">' + value + '</option>');
                                }
                            });
                            $.each(html.cities,function(key,value){
                                if (key == selectCity) {
                                    $("#city").append('<option selected="selected" value="'+key+'">'+value+'</option>');
                                } else {
                                    $("#city").append('<option value="'+key+'">'+value+'</option>');
                                }
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

            $('#country').on('change', function(){
                var countryId = $(this).val();
                $("#ship_country").select2().val(countryId).trigger("change");
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
                                $("#state").append('<option value="">{{ __('Select State') }}</option>');
                                $("#city").append('<option value="">{{ __('Select City') }}</option>');
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