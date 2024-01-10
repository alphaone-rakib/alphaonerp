@extends('layouts.master')
@section('title') @lang('Bin')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Bin') @endslot
        @slot('title') @lang('Show Bin')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Bin Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($bin->name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Bin')</th>
                                        <td class="col-md-4 text-muted">{{ $bin->name }}</td>
                                    @endif
                                    <th class="ps-0 col-md-2" scope="row">@lang('Inactive')</th>
                                    @if(isset($bin->inactive) && $bin->inactive == 1)
                                        <td class="col-md-4 text-muted">@lang('Enable')</td>
                                    @else
                                        <td class="col-md-4 text-muted">@lang('Disable')</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($bin->zone))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Zone')</th>
                                        <td class="col-md-4 text-muted">{{ $bin->zone }}</td>
                                    @endif
                                    <th class="ps-0 col-md-2" scope="row">@lang('Non-Nettable')</th>
                                    @if(isset($bin->non_nettable) && $bin->non_nettable == 1)
                                        <td class="col-md-4 text-muted">@lang('Enable')</td>
                                    @else
                                        <td class="col-md-4 text-muted">@lang('Disable')</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($bin->squence))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Squence')</th>
                                        <td class="col-md-4 text-muted">{{ $bin->squence }}</td>
                                    @endif
                                    <th class="ps-0 col-md-2" scope="row">@lang('Portable')</th>
                                    @if(isset($bin->portable) && $bin->portable == 1)
                                        <td class="col-md-4 text-muted">@lang('Enable')</td>
                                    @else
                                        <td class="col-md-4 text-muted">@lang('Disable')</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($bin->description))
                                        <th class="ps-0">@lang('Description')</th>
                                        <td>{{ $bin->description }}</td>
                                    @endif
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
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
