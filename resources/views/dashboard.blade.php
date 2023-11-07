@extends('layouts.master')
@section('title') @lang('Starter')  @endsection
@section('content')
@component('components.breadcrumb')
@slot('li_1') @lang('Pages') @endslot
@slot('title') @lang('Starter')  @endslot
@endcomponent

{{-- @foreach($menus as $category)

                @php
                    dd($category);
                @endphp

                @endforeach --}}
@endsection
@section('script')
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
