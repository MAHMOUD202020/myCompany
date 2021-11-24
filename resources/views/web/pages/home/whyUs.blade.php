@php($block = $blocks->where('name' , 'whyUs')->first())

@if ($block)

<!-- Start Choose Area -->
<section class="choose-section ptb-100">
    <div class="container">
        <div class="section-title">
            <h2>{{$block->title}}</h2>
            <p>{{$block->text}}</p>
            <div class="bar"></div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-6">
                @foreach($block->items as $item)
                    <div class="choose-content">
                    <div class="icon">
                        <i class="flaticon-shared-folder"></i>
                    </div>
                    <h3>{{$item->title}}</h3>
                    <p>{{$item->text}}</p>
                </div>
                @endforeach
            </div>

            <div class="col-lg-6">
                <div class="choose-image">
                    <img src="{{asset("assets/web/images/block/$block->img")}}" alt="image">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Choose Area -->

@endif
