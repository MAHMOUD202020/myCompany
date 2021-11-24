<!-- Start Banner Area -->
<div class="main-banner-area">
    <div class="home-sliders owl-carousel owl-theme">
        @foreach($sliders as $slider)
            <div class="home-item item" style='background-image: url("{{asset("assets/web/images/slider/$slider->background")}}")'>
                <div class="d-table">
                    <div class="d-table-cell">
                        <div class="container">
                            <div class="main-banner-content">
                                <h1>{{$slider->title}}</h1>
                                <p>{{$slider->text}}</p>
                                @if ($slider->btn_text)
                                    <div class="banner-btn">
                                        <a href="{{$slider->url}}" class="default-btn">{{$slider->btn_text}}</a>
                                    </div>
                                @endif

                            </div>

                            <div class="banner-image" style="margin:5%" >
                                <img  style="position: relative; display: inline-block; left: 50%; transform: translate(-50%);"  src="{{asset("assets/web/images/slider/$slider->img")}}" alt="image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<!-- End Banner Area -->
