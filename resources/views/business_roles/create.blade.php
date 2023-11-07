@extends('layouts.master')
@section('title') @lang('Business Role')  @endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/dropify/dist/css/dropify.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1') @lang('Business Role') @endslot
        @slot('title') @lang('Create Business Role')  @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <form class="form-material form-horizontal" action="{{ route('business-role.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">@lang('Business Role Create Information')</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="role_id" class="form-label">@lang('Business Role Id') <b class="ambitious-crimson">*</b></label>
                                    <input id="role_id" class="form-control @error('role_id') is-invalid @enderror" type="text" name="role_id" value="{{ old('role_id') }}" placeholder="@lang('Type Your Business Role Id')" required>
                                    @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">@lang('Business Role Name') <b class="ambitious-crimson">*</b></label>
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" placeholder="@lang('Type Your Business Role Name')" required>
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
                                    <textarea id="description" class="form-control" name="description" rows="3" placeholder="@lang('Type Your Plant Description')"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="verti-sitemap">
                                                    <ul class="list-unstyled mb-0">
                                                        <li class="p-0 parent-title"><a href="javascript: void(0);"
                                                                class="fw-medium fs-14">@lang('Authorized Menu')</a>
                                                        </li>
                                                        @foreach($categories as $category)
                                                        <div class="first-list">
                                                            <div class="list-wrap">
                                                                <div class="form-check form-check-primary">
                                                                    <input id="{{$category->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="menus[]" table_id="{{ $category->id }}" value="{{ $category->id }}" style="margin-left: -26px !important">
                                                                    <label for="{{$category->id}}" class="form-label">{{$category->name}}</label>
                                                                </div>
                                                            </div>
                                                            @foreach($category->children as $child)
                                                            <ul class="second-list list-unstyled">
                                                                <li>
                                                                    <div class="form-check form-check-secondary">
                                                                        <input id="{{$child->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="menus[]" table_id="{{ $category->id }}" value="{{ $child->id }}" style="margin-left: -26px !important">
                                                                        <label for="{{$child->id}}" class="form-label">{{$child->name}}</label>
                                                                    </div>
                                                                    @foreach($child->children as $child2)
                                                                    <ul class="third-list list-unstyled">
                                                                        <li>
                                                                            <div class="form-check form-check-info">
                                                                                <input id="{{$child2->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="menus[]" value="{{ $child2->id }}" style="margin-left: -26px !important">
                                                                                <label for="{{$child2->id}}" class="form-label">{{$child2->name}}</label>
                                                                            </div>
                                                                            @foreach($child2->children as $child3)
                                                                            <ul class="third-list list-unstyled">
                                                                                <li>
                                                                                    <div class="form-check form-check-dark">
                                                                                        <input id="{{$child3->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="menus[]" value="{{ $child3->id }}" style="margin-left: -26px !important">
                                                                                        <label for="{{$child3->id}}" class="form-label">{{$child3->name}}</label>
                                                                                    </div>
                                                                                    @foreach($child3->children as $child4)
                                                                                    <ul class="third-list list-unstyled">
                                                                                        <li>
                                                                                            <div class="form-check form-check-success">
                                                                                                <input id="{{$child4->id}}" class="form-check-input authorized_menu_click" type="checkbox" name="menus[]" value="{{ $child4->id }}" >
                                                                                                <label for="{{$child4->id}}" class="form-label">{{$child4->name}}</label>
                                                                                            </div>
                                                                                        </li>
                                                                                    </ul>
                                                                                    @endforeach
                                                                                </li>
                                                                            </ul>
                                                                            @endforeach
                                                                        </li>
                                                                    </ul>
                                                                    @endforeach
                                                                </li>
                                                            </ul>
                                                            @endforeach
                                                        </div>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="submit" value="@lang('submit')" class="btn btn-info btn-lg"/>
                        <a href="{{ route('dashboard.index') }}" class="btn btn-warning btn-lg float-end">@lang('cancel')</a>
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
    <script src="{{ URL::asset('assets/js/multiselect.js') }}"></script>
    <script>
        $(document).ready(function() {
            "use strict";
            $('.select2').select2();

            $('#multiselect').multiselect();

        });
    </script>
@endsection