<div class="container mt-3">

    <h3 class="title"> @lang('form.label.items now')</h3>

    @if($sliders->count())
        @foreach($sliders as $slider)
            <div class="row bg-light pt-3 pb-3">
                <div class="col-md-6">
                    <div class="item-img" style='background-image: url("{{asset("assets/web/images/slider/$slider->img")}}")'></div>
                </div>

                <div class="col-md-6">
                    <div class="item-background" style='background-image: url("{{asset("assets/web/images/slider/$slider->background")}}")'></div>

                    <hr>

                    <div class="h2 text-center">{{$slider->title}}</div>

                    <p>{{$slider->text}}</p>

                    <hr>

                    @if($slider->btn_text)
                        <p>@lang('form.label.btn text') : {{$slider->btn_text}}</p>
                    @endif

                    @if($slider->url)
                        <p>@lang('form.label.link') : {{$slider->url}}</p>
                    @endif

                </div>

                <div class="col mt-3">
                    <a href="{{route('admin.sliders.edit' , $slider->id)}}" class="btn btn-success">@lang('form.label.edit data')</a>

                    <form method="post" action="{{route('admin.sliders.destroy' , $slider->id)}}" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button type="submit"  class="btn btn-danger">@lang('form.label.delete')</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">@lang('form.label.not any items')</div>
    @endif

</div>
