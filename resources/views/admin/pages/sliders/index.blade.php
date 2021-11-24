@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.sliders')</span></li>
@endsection

@section('content')


    @include('admin.includes.alert_success')

    @include('admin.pages.sliders.show')


@endsection


@section('css')
    <style>

        .item-img{
            height: 400px;
            border: 1px solid;
            background-size:cover;
        }

        .item-background{
            margin-bottom: 15px;
            height: 150px;
            border: 1px solid;
            background-size:cover;
        }
    </style>
@endsection
