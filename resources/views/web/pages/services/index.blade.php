@extends('web.master' , ['title_seo' => $page->name])

@section('content')

    <!-- Start Page Title Area -->
    <div class="page-title-area item-bg-4" style='background-image: url("{{asset("assets/web/images/pages/$page->cover")}}")'>
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="page-title-content">
                        <h2>{{$page->name}}</h2>
                        <ul>
                            <li><a href="{{route('web.home')}}">@lang('layout.page-home')</a></li>
                            <li>{{$page->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->


    @include('web.pages.home.services')

    {!! $page->content !!}

@endsection
