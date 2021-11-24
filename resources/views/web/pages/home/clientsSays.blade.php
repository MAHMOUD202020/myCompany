@php($block = $blocks->where('name' , 'clientsSays')->first())

@if ($block)

<!-- Start Clients Area -->
<section class="clients-section">
    <div class="container">
        <div class="section-title">
            <h2>{{$block->title}}</h2>
            <p>{{$block->text}}</p>
            <div class="bar"></div>
        </div>

        <div class="clients-slider owl-carousel owl-theme">

            @foreach($block->items as $item)

                <div class="clients-item">
                    <div class="icon">
                        <i class="flaticon-left-quotes-sign"></i>
                    </div>

                    <p>{{$item->text}}</p>

                    <div class="clients-content">
                        <h3>{{$item->title}}</h3>
                    </div>
                </div>

            @endforeach
        </div>
    </div>
</section>
<!-- End Clients Area -->

@endif
