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

    @if ($block)
        <section class="protfolio-section pt-100 pb-100">
            <div class="container">
                <div class="section-title">
                    <h2>{{$block->title}}</h2>
                    <p>{{$block->text}}</p>
                    <div class="bar"></div>
                </div>

                <div class="row">

                    @foreach($projects as $project)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="single-protfolio">
                                <div class="image">
                                    <a href="{{route('web.projects.show' , $project->id)}}">
                                        <img src="{{asset("assets/web/images/projects/$project->img")}}" alt="image">
                                    </a>
                                </div>

                                <div class="content">
                                    <a href="{{route('web.projects.show' , $project->id)}}">
                                        <h3>{{$project->name}}</h3>
                                    </a>
                                    <a href="{{route('web.projects.show' , $project->id)}}">
                                        <span>{{$project->category}}</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12 col-md-12">
                        <div class="pagination-area">
                            {!! $projects->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endif


    {!! $page->content !!}

@endsection
