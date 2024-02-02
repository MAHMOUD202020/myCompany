<form action="{{ route('admin.categories.sort.save')}}" method="post">
    @csrf
<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>@lang('form.label.sort category')</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <div class='parent ex-3'>
                <div class='row'>

                        <div class="col-12">

                            @foreach($categories as $category)

                            <div id='section-{{$loop->index}}' class='dragula rm-spill'>

                                <div class="media d-block d-sm-flex text-sm-left text-center">
                                    <div class="media-body">
                                        <h5 class="">{{$category->name_en}} - {{$category->name_ar}} </h5>
                                        <input type="hidden" name="category_id[{{$category->id}}]" value="{{$category->id}}">
                                    </div>
                                </div>


                            </div>

                            @endforeach

                        </div>

                </div>
            </div>


        </div>
    </div>
</div>
    <button type="submit" class="btn btn-success d-block w-100">@lang('form.label.save sort')</button>

</form>
