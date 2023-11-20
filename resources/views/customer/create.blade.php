@extends('layouts.master')
@section('title') @lang('Customer')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Customer') @endslot
        @slot('title') @lang('Create Customer')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Customer Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border card-border-info">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">@lang('Customer Information Tab')</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                                    <input id="name"  class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('Type Your Customer Name')" required>
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
                                                <div class="mb-2">
                                                    <label for="address_one" class="form-label">@lang('Address One')</label>
                                                    <input id="address_one"  class="form-control @error('address_one') is-invalid @enderror" type="text" name="address_one" value="{{ old('address_one') }}" placeholder="@lang('Type Your Address One')">
                                                    @error('address_one')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
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
                                            <div class="col-md-12">
                                                <div class="mb-2">
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="state" class="form-label">@lang('State') <b class="ambitious-crimson">*</b></label>
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
                                            <div class="col-md-12">
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
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
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="phone" class="form-label">@lang('Phone')</label>
                                                    <input id="phone"  class="form-control @error('phone') is-invalid @enderror" type="text" name="phone" value="{{ old('phone') }}" placeholder="@lang('Type Your Phone Number')">
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="fax" class="form-label">@lang('Fax')</label>
                                                    <input id="fax"  class="form-control @error('fax') is-invalid @enderror" type="text" name="fax" value="{{ old('fax') }}" placeholder="@lang('Type Your Fax Address')">
                                                    @error('fax')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="email" class="form-label">@lang('Email')</label>
                                                    <input id="email"  class="form-control @error('email') is-invalid @enderror" type="text" name="email" value="{{ old('email') }}" placeholder="@lang('Type Your Email Address')">
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="url" class="form-label">@lang('URL')</label>
                                                    <input id="url"  class="form-control @error('url') is-invalid @enderror" type="text" name="url" value="{{ old('url') }}" placeholder="@lang('Type Your URL Address')">
                                                    @error('url')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card border card-border-info">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">@lang('Shipping Information Tab')</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check form-check-info mb-3">
                                                    <input id="same_as_customer_info" class="form-check-input" type="checkbox" name="same_as_customer_info" value="{{ true }}">
                                                    <label for="same_as_customer_info" class="form-label">@lang('Shipping Info Same As Customer Info')</label>
                                                    @error('same_as_customer_info')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_address_one" class="form-label">@lang('Ship Address One')</label>
                                                    <input id="ship_address_one"  class="form-control @error('ship_address_one') is-invalid @enderror" type="text" name="ship_address_one" value="{{ old('ship_address_one') }}" placeholder="@lang('Type Your Shipping Address One Address')">
                                                    @error('ship_address_one')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_address_two" class="form-label">@lang('Ship Address Two')</label>
                                                    <input id="ship_address_two"  class="form-control @error('ship_address_two') is-invalid @enderror" type="text" name="ship_address_two" value="{{ old('ship_address_two') }}" placeholder="@lang('Type Your Shipping Address Two Address')">
                                                    @error('ship_address_two')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_country" class="form-label">@lang('Ship Country') <b class="ambitious-crimson">*</b></label>
                                                    <select id="ship_country" class="form-control @error('ship_country') is-invalid @enderror select2" name="ship_country" required>
                                                        <option value="">@lang('Select Ship Country')</option>
                                                        @foreach($countriesList as $key => $value)
                                                        <option value="{{ $key }}" {{ old('ship_country') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('ship_country')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_state" class="form-label">@lang('Ship State') <b class="ambitious-crimson">*</b></label>
                                                    <select id="ship_state" class="form-control @error('ship_state') is-invalid @enderror select2" name="ship_state" required>
                                                        <option value="">@lang('Select Ship State')</option>
                                                    </select>
                                                    @error('ship_state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_city" class="form-label">@lang('Ship City')</label>
                                                    <select id="ship_city" class="form-control @error('ship_city') is-invalid @enderror select2" name="ship_city">
                                                        <option value="">@lang('Select Ship City')</option>
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
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_zip_code" class="form-label">@lang('Ship Zip Code')</label>
                                                    <input id="ship_zip_code" class="form-control @error('ship_zip_code') is-invalid @enderror" type="text" name="ship_zip_code" value="{{ old('ship_zip_code') }}" placeholder="@lang('Type Your Ship Zip Code')">
                                                    @error('ship_zip_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_phone" class="form-label">@lang('Ship Phone')</label>
                                                    <input id="ship_phone"  class="form-control @error('ship_phone') is-invalid @enderror" type="text" name="ship_phone" value="{{ old('ship_phone') }}" placeholder="@lang('Type Your Ship Phone Number')">
                                                    @error('ship_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="ship_fax" class="form-label">@lang('Ship Fax')</label>
                                                    <input id="ship_fax"  class="form-control @error('ship_fax') is-invalid @enderror" type="text" name="ship_fax" value="{{ old('ship_fax') }}" placeholder="@lang('Type Your Ship Fax Address')">
                                                    @error('ship_fax')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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

                $('#same_as_customer_info').on('click', function() {
                    let address_one = $("#address_one").val();
                    let address_two = $("#address_two").val();
                    let zip_code = $("#zip_code").val();
                    let phone = $("#phone").val();
                    let fax = $("#fax").val();
                    let country = $("#country").val();
                    if ($('#same_as_customer_info').is(":checked")) {

                        $("#ship_address_one").val(address_one);
                        $("#ship_address_two").val(address_two);
                        $("#ship_zip_code").val(zip_code);
                        $("#ship_phone").val(phone);
                        $("#ship_fax").val(fax);
                        $("#ship_country").select2().val(country).trigger("change");

                    } else {

                        $("#ship_address_one").val('');
                        $("#ship_address_two").val('');
                        $("#ship_zip_code").val('');
                        $("#ship_phone").val('');
                        $("#ship_fax").val('');
                        $("#ship_country").select2().val('').trigger("change");
                    }
                });
                $('.dropify').dropify();
    
                $('.select2').select2();
    
                $("#fiscal_calendar").flatpickr({
                    enableTime: false,
                    dateFormat: "d-m",
                    defaultDate: "1-6"
                });
    
                $("#production_calendar").flatpickr({
                    enableTime: false,
                    dateFormat: "d-m",
                    defaultDate: "1-6"
                });
    
                $('#currency_code').change(function() {
                    $.ajax({
                        url: '{{ route('currency.code') }}',
                        type: 'GET',
                        dataType: 'JSON',
                        data: 'code=' + $(this).val(),
                        success: function(data) {
                            $('#currency_name').val(data.name);
                            $('#currency_symbol').val(data.symbol);
                            $('#currency_symbol_first').trigger('change');
                        }
                    });
                });
    
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
    