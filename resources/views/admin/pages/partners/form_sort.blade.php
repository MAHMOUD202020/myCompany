<form action="{{ route('admin.partners.sort.save')}}" method="post">
    @csrf
<div class="col-lg-12 layout-spacing">
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>@lang('form.label.sort partner')</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">

            <div class='parent ex-3'>
                <div class='row'>

                        <div class="col-12">

                            @foreach($partners as $partner)

                            <div id='section-{{$loop->index}}' class='dragula rm-spill'>

                                <div class="media d-block d-sm-flex text-sm-left text-center">
                                    <div class="media-body">
                                        <div>
                                            <img src="{{asset("assets/web/images/partners/$partner->icon")}}" alt="">
                                            {{$partner->name_en}} - {{$partner->name_ar}}
                                        </div>
                                        <input type="hidden" name="partner_id[{{$partner->id}}]" value="{{$partner->id}}">
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
