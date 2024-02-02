<div class="container mt-3">

    <h3 class="title"> @lang('form.label.items now')</h3>

    @if($sliders->count())
        @foreach($sliders as $slider)

            <div class="row bg-light pt-3 pb-3 border-solid mb-5">

                <div class="col-md-12">
                    <h3>Slide {{$slider->sort}}</h3>
                    <div class="" style='background-image: url("{{asset("assets/web/images/slider/$slider->background")}}"); background-size: cover !important; height: 200px'></div>
                </div>

                <div class="col-md-12">
                    <table class="table table-info">
                        <tr>
                            <td>Iamge</td>
                            <td>
                                @if($slider->img)
                                    <div class="item-img" style='max-width:50px; max-height:50px; background-image: url("{{asset("assets/web/images/slider/$slider->img")}}")'></div>
                                @else
                                    None
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <td>Title</td>
                            <td>
                                @if($slider->title)
                                    {{$slider->title}}
                                @else
                                    None
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <td>Description</td>
                            <td>
                                @if($slider->text)
                                    {{$slider->text}}
                                @else
                                    None
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Button Text</td>
                            <td>
                                @if($slider->btn_text)
                                    {{$slider->btn_text}}
                                @else
                                    None
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Button Url</td>
                            <td>
                                @if($slider->url)
                                    {{$slider->url}}
                                @else
                                    None
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>


                <div class="col-md-3 mt-3">
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
