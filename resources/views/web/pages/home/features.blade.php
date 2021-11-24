@php($block = $blocks->where('name' , 'features')->first())

@if ($block)
    <!-- Start Features Area -->
    <section class="features-section pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>{{$block->title}}</h2>
                <p>{{$block->text}}</p>
                <div class="bar"></div>
            </div>

            <div class="row">
                @foreach($block->items as $item)
                    <div class="col-lg-3 col-md-6">
                        <div class="features-content">
                            <div class="icon">
                                <i class="{{$item->icon}}"></i>
                            </div>
                            <h3>{{$item->title}}</h3>
                            <p>{{$item->text}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Features Area -->
@endif
