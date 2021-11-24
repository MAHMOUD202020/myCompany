@extends('web.master')

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg-4" style='background-image: url("{{asset("assets/web/images/pages/$page->cover")}}")'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{$page["name_$lang"]}}</h2>
                        <ul>
                            <li><a href="{{route('web.home')}}">@lang('layout.page-home')</a></li>
                            <li>@lang('layout.pages')</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start Services Details Area -->
    <section class="services-details-area ptb-100">
        <div class="container">
            {!! $page["description_$lang"] !!}
        </div>
    </section>
    <!-- End Services Details Area -->

@endsection
