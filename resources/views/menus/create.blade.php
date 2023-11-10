@extends('layouts.master')
@section('title') @lang('Menu')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Menu') @endslot
        @slot('title') @lang('Create Menu')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Menu Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name" class="form-control @error('Name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('Type Your Menu Name')" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="menu_order" class="form-label">@lang('Menu Order')</label>
                                    <select id="menu_order" class="form-control @error('menu_order') is-invalid @enderror select2" name="menu_order">
                                        <option value="">@lang('Select Menu Order')</option>
                                        @foreach($menuOrders as $key => $value)
                                        <option value="{{ $key }}" >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="parent_id" class="form-label">@lang('Parent Menu')</label>
                                    <select id="parent_id" class="form-control @error('parent_id') is-invalid @enderror select2" name="parent_id">
                                        <option value="">@lang('Select Parent Menu')</option>
                                        @foreach($menuItems as $value)
                                        <option value="{{ $value->id }}" >{{ $value->name." ( ".$value->menu_href." )" }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="icon_part">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        
                                        <label for="parent_menu_icon" class="form-label">@lang('Parent Menu Icon') <b class="ambitious-crimson">*</b></label>
                                        <select id="parent_menu_icon" class="form-control @error('parent_menu_icon') is-invalid @enderror select23" name="parent_menu_icon">
                                            <option value="">@lang('Select Icon')</option>
                                            @foreach($mdiIcon as $key => $value)
                                            <option value="{{ $value }}" >{{ ucfirst($key) }}</option>
                                            @endforeach
                                        </select>
                                        @error('parent_menu_icon')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="menu_href" class="form-label">@lang('Menu Href') <b class="ambitious-crimson">*</b></label>
                                    <select id="menu_href" class="form-control @error('menu_href') is-invalid @enderror select2" name="menu_href" required>
                                        <option value="">@lang('Select Menu Location')</option>
                                        @foreach($menusHref as $key => $value)
                                        <option value="{{ $key }}" {{ old('menu_href','javascript:void(0)') == $key ? 'selected' : '' }} >{{ $value }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_href')
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

            $('#parent_id').on('change', function(){
                var parent_id = $(this).val();
                if(parent_id == "") {
                    $("#icon_part").show();
                } else {
                    $("#icon_part").hide();
                }
            });

            function formatState (state) {
                if (!state.id) {
                    return state.text;
                }
                var baseUrl = "/assets/images/icon";
                var $state = $(
                    '<span><img src="' + baseUrl + '/' + state.element.value + '.png" class="img-flag" width="25" height="25" /> ' + state.text + '</span>'
                );

                $state.find("span").text(state.text);
                $state.find("img").attr("src", baseUrl + "/" + state.element.value + ".png");

                return $state;
            };

            function formatSelectState (state) {

                if (!state.id) {
                    return state.text;
                }

                var baseUrl = "/assets/images/icon";
                var $state = $(
                    '<span><img class="img-flag" width="25" height="25" /> <span></span></span>'
                );

                $state.find("span").text(state.text);
                $state.find("img").attr("src", baseUrl + "/" + state.element.value + ".png");

                return $state;

            };

            $('.select23').select2({
                templateResult: formatState,
                templateSelection: formatSelectState
            });

        });
    </script>
@endsection