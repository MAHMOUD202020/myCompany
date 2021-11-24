@php($block = $blocks->where('name', 'services')->first())

@if ($block)
    <!-- Start Services Area -->
    <section class="services-section bg-color pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{$block->title}}</h2>
                <p>{{$block->text}}</p>
                <div class="bar"></div>
            </div>

            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-services">
                            <div class="icon">
                                <i class="{{$service->icon}}"></i>
                            </div>
                            <h3>{{$service->name}}</h3>
                            <p>{{$service->shortDescription}}</p>
                            <a href="{{route('web.services.show' , $service->id)}}" class="read-btn">@lang('form.label.read more')</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="default-shape">
            <div class="shape-1">
                <img src="{{asset('assets/web/img/shape/4.png')}}" alt="image">
            </div>

            <div class="shape-2 rotateme">
                <img src="{{asset('assets/web/img/shape/5.svg')}}" alt="image">
            </div>

            <div class="shape-3">
                <img src="{{asset('assets/web/img/shape/6.svg')}}" alt="image">
            </div>

            <div class="shape-4">
                <img src="{{asset('assets/web/img/shape/7.png')}}" alt="image">
            </div>

            <div class="shape-5">
                <img src="{{asset('assets/web/img/shape/8.png')}}" alt="image">
            </div>
        </div>

        <div class="services-shape">
            <img src="{{asset('assets/web/img/cloud.png')}}" alt="image">
        </div>
    </section>
    <!-- End Services Area -->
@endif
