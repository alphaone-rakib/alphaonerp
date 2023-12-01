@extends('layouts.master')
@section('title') @lang('Product Group')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Product Group') @endslot
        @slot('title') @lang('Show Product Group')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Product Group Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($productGroup->group_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Group Id')</th>
                                        <td class="col-md-4 text-muted">{{ $productGroup->group_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productGroup->group_name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Group Name')</th>
                                        <td class="col-md-4 text-muted">{{ $productGroup->group_name }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($productGroup->description))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                        <td class="col-md-4 text-muted">{!! $productGroup->description !!}</td>
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
