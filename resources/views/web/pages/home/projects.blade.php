@php($block = $blocks->where('name', 'projects')->first())

@if ($block)
    <!-- Start Projects Area -->
    <section class="projects-section pb-70">
        <div class="container-fluid">
            <div class="section-title">
                <h2>{{$block->title}}</h2>
                <p>{{$block->text}}</p>
                <div class="bar"></div>
            </div>

            <div class="row">
                @foreach($projects as $project)
                    <div class="col-lg-4">
                        <div class="single-projects">
                            <div class="projects-image">
                                <img src="{{asset("assets/web/images/projects/$project->img")}}" alt="image">
                            </div>

                            <div class="projects-content">
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
            </div>
        </div>
    </section>
    <!-- End Projects Area -->

@endif
