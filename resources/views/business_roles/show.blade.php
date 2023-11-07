@extends('layouts.master')
@section('title') @lang('Business Role')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Business Role') @endslot
        @slot('title') @lang('Show Business Role')  @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card profile-project-card profile-project-success mb-0">
                <div class="card-header">
                    <h5 class="fs-14 text-truncate mb-1"><b>@lang('Show Business Role Information')</b></h5>
                </div>
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tbody>
                                <tr>
                                    @if (isset($businessRole->role_id))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Business Role Id')</th>
                                        <td class="col-md-4 text-muted">{{ $businessRole->role_id }}</td>
                                    @endif
                                </tr>
                                <tr>
                                    @if (isset($businessRole->name))
                                        <th class="ps-0 col-md-2" scope="row">@lang('Business Role Name')</th>
                                        <td class="col-md-4 text-muted">{{ $businessRole->name }}</td>
                                    @endif
                                </tr>
                                @if (isset($businessRole->description))
                                <tr>
                                    <th class="ps-0 col-md-2" scope="row">@lang('Description')</th>
                                    <td class="col-md-4 text-muted">{!! $businessRole->description !!}</td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="verti-sitemap">
                                <ul class="list-unstyled mb-0">
                                    <li class="p-0 parent-title"><a href="javascript: void(0);" class="fw-medium fs-14">@lang('Authorized Menu')</a></li>
                                    @foreach($categories as $category)
                                    @if(in_array($category->id, $menuItems))
                                    <li>
                                        <div class="first-list">
                                            <div class="list-wrap">
                                                <a href="javascript: void(0);" class="fw-medium text-primary">{{$category->name}}</a>
                                            </div>
                                            @foreach($category->children as $child)
                                            @if(in_array($child->id, $menuItems))
                                            <ul class="second-list list-unstyled">
                                                <li>
                                                    <a href="javascript: void(0);">{{$child->name}}</a>
                                                    @foreach($child->children as $child2)
                                                    @if(in_array($child2->id, $menuItems))
                                                    <ul class="third-list list-unstyled">
                                                        <li>
                                                            <a href="javascript: void(0);">{{$child2->name}}</a>
                                                            @foreach($child2->children as $child3)
                                                            @if(in_array($child3->id, $menuItems))
                                                            <ul class="third-list list-unstyled">
                                                                <li>
                                                                    <a href="javascript: void(0);">{{$child3->name}}</a>
                                                                    @foreach($child3->children as $child4)
                                                                    @if(in_array($child4->id, $menuItems))
                                                                    <ul class="third-list list-unstyled">
                                                                        <li>
                                                                            <a href="javascript: void(0);">{{$child4->name}}</a>
                                                                        </li>
                                                                    </ul>
                                                                    @endif
                                                                    @endforeach
                                                                </li>
                                                            </ul>
                                                            @endif
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    @endif
                                                    @endforeach
                                                </li>
                                            </ul>
                                            @endif
                                            @endforeach
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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