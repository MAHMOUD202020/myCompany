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

    <!-- Start About Area -->
    @php($aboutCompany = $blocks->where('name' , 'aboutCompany')->first())

    <section class="about-section ptb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 p-0">
                    <div >
                        <img src="{{asset("assets/web/images/block/$aboutCompany->img")}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="about-tab">
                        <h2>{{$aboutCompany->title}}</h2>
                        <div class="bar"></div>
                        <p>{{$aboutCompany->text}}</p>

                        <div class="tab about-list-tab">
                            <ul class="tabs">
                                @foreach($aboutCompany->items as $item)
                                <li>
                                    <a href="#">
                                       {{$item->title}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>

                            <div class="tab_content">
                                @foreach($aboutCompany->items as $item)
                                    <div class="tabs_item">
                                        {{$item->text}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Area -->

    @include('web.pages.home.clientsSays')

    <section class="protfolio-section pt-100 pb-100">
        <div class="container">
            {!! $page->description !!}
        </div>
    </section>

@endsection
