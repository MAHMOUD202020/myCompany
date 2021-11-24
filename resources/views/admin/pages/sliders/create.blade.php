@extends('admin.master')

@section('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('admin.sliders.index')}}">@lang('layout.sliders')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.add slider')</span></li>
@endsection

@section('content')

    @include('admin.includes.alert_success')

    <div class="widget-content widget-content-area mt-5">
    <h3 class="title"> @lang('form.label.add item')</h3>
    <form method="post" action="{{ route('admin.sliders.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-row mb-4">

            <div class="form-group col-md-6">
                <label for="title_ar">@lang('form.label.title ar')</label>
                <input name="title_ar" type="text" maxlength="100" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" value="{{old('title_ar')}}" required>
                @error('title_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="title_en">@lang('form.label.title en')</label>
                <input name="title_en" type="text" maxlength="100" class="form-control @error('title_en') is-invalid @enderror" id="title_en" value="{{old('title_en')}}" required>
                @error('title_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="img">@lang('form.label.img')</label>
                <input name="img" type="file" class="form-control @error('img') is-invalid @enderror" id="img" value="{{old('img')}}" required>
                @error('img')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="background">@lang('form.label.background')</label>
                <input name="background" type="file" class="form-control @error('background') is-invalid @enderror" id="background" value="{{old('background')}}" required>
                @error('background')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-12">
                <label for="text_ar">@lang('form.label.text ar') @lang('form.label.optional')</label>
                <textarea name="text_ar" maxlength="255" class="form-control @error('text_ar') is-invalid @enderror" id="text_ar"> {{old('text_ar')}} </textarea>
                @error('text_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-12">
                <label for="text_en">@lang('form.label.text en') @lang('form.label.optional')</label>
                <textarea name="text_en" maxlength="255" class="form-control @error('text_en') is-invalid @enderror" id="text_en"> {{old('text_en')}} </textarea>
                @error('text_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="btn_text_ar">@lang('form.label.btn text ar') @lang('form.label.optional')</label>
                <input name="btn_text_ar" type="text" maxlength="100" class="form-control @error('btn_text_ar') is-invalid @enderror" id="btn_text_ar" value="{{old('btn_text_ar')}}">
                @error('btn_text_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>
            <div class="form-group col-md-6">
                <label for="btn_text_en">@lang('form.label.btn text en') @lang('form.label.optional')</label>
                <input name="btn_text_en" type="text" maxlength="100" class="form-control @error('btn_text_en') is-invalid @enderror" id="btn_text_en" value="{{old('btn_text_en')}}">
                @error('btn_text_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="sort">@lang('form.label.sort')</label>
                <input name="sort" type="number" class="form-control @error('sort') is-invalid @enderror" id="sort" value="{{old('sort' , 1)}}">
                @error('sort')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

            <div class="form-group col-md-6">
                <label for="url">@lang('form.label.link') @lang('form.label.optional')</label>
                <input name="url" type="text" maxlength="255" class="form-control @error('url') is-invalid @enderror" id="url" value="{{old('url')}}">
                @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
            </div>

        </div>

        <button type="submit" class="btn btn-primary mt-3"> @lang('form.label.add item')</button>
    </form>
</div>

@endsection
