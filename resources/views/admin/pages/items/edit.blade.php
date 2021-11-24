@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.blocks.index' , ['page' => $block->page])}}">@lang("layout.blocks")</a></li>
    <li class="breadcrumb-item"><a href="{{ route('admin.items.index' , ['block' => $block->id])}}">{{$block->title}}</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.add item')</span></li>
@endsection

@section('content')

    @include('admin.includes.alert_success')

    <div class="widget-content widget-content-area">

        <div class="bg-light p-3 mb-2"><a href="{{route('admin.items.index' , ['block' => $block->id])}}" class="btn btn-success"> <--- @lang('form.label.back to') @lang('form.label.items block') {{$block->title}}</a></div>

        <h3 class="title">@lang('form.label.edit item')</h3>

        <form method="post" action="{{ route('admin.items.update' , $item->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')

        <div class="form-row mb-4">

            <div class="form-group col-md-6">
                <label for="title_ar">@lang('form.label.title ar')</label>
                <input name="title_ar" type="text" maxlength="100" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" value="{{old('title_ar' , $item->title_ar)}}" required>
                @error('title_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="title_en">@lang('form.label.title en')</label>
                <input name="title_en" type="text" maxlength="100" class="form-control @error('title_en') is-invalid @enderror" id="title_en" value="{{old('title_en' , $item->title_en)}}" required>
                @error('title_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-12">
                <label for="text_ar">@lang('form.label.text ar') @lang('form.label.optional')</label>
                <textarea name="text_ar" maxlength="1000" class="form-control @error('text_ar') is-invalid @enderror" id="text_ar"> {{old('text_ar'  , $item->text_ar)}} </textarea>
                @error('text_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-12">
                <label for="text_en">@lang('form.label.text en') @lang('form.label.optional')</label>
                <textarea name="text_en" maxlength="1000" class="form-control @error('text_en') is-invalid @enderror" id="text_en"> {{old('text_en'  , $item->text_en)}} </textarea>
                @error('text_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group col-md-6">
                <label for="icon">@lang('form.label.icon') @lang('form.label.optional')</label>
                <input name="icon" type="text" maxlength="50" class="form-control @error('icon') is-invalid @enderror" id="icon" value="{{old('icon' , $item->icon)}}">
                @error('icon')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="sort">@lang('form.label.sort') @lang('form.label.optional')</label>
                <input name="sort" type="number" class="form-control @error('sort') is-invalid @enderror" id="sort" value="{{old('sort' , $item->sort)}}">
                @error('sort')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-12">
                <label for="img">@lang('form.label.img') @lang('form.label.optional')</label>
                @if ($item->img)
                    <div><img width="60" height="60" src="{{asset("assets/web/images/block/$item->img")}}" alt=""></div>
                @endif
                <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="img" value="{{old('img' , $item->img)}}">
                @error('img')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3">@lang('form.label.edit item')</button>
    </form>
</div>

@endsection

