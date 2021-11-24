@php($block = $blocks->where('name' , 'development')->first())

@if ($block)
    @php($colors = ['bg-66a6ff', 'bg-05dbcf' , 'bg-fec66f' , 'bg-66a6ff', 'bg-66a6ff', 'bg-05dbcf' , 'bg-fec66f' , 'bg-66a6ff', 'bg-66a6ff', 'bg-05dbcf' , 'bg-fec66f' , 'bg-66a6ff', 'bg-66a6ff', 'bg-05dbcf' , 'bg-fec66f' , 'bg-66a6ff'])

    <!-- Start Development Area -->
    <section class="development-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="development-image">
                        <img src="{{asset("assets/web/images/block/$block->img")}}" alt="image">
                    </div>
                </div>

                <div class="col-lg-6">
                    @foreach($block->items as $item)

                        <div class="development-content">
                            <div class="icon {{$colors[$loop->index]}}">
                                <i class="{{$item->icon}}"></i>
                            </div>
                            <h3>{{$item->title}}</h3>
                            <p>{{$item->text}}</p>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End Development Area -->
@endif
