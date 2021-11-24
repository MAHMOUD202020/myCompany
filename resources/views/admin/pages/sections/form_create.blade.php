<form method="post" action="{{ route('admin.sections.store')}}">
    @csrf
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name ar')</label>
            <input name="name_ar" type="text" maxlength="50" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="اسم القسم باللغة العربية" value="{{old('name_ar')}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name en')</label>
            <input name="name_en" type="text" maxlength="50" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="اسم القسم باللغة الانجليزية" value="{{old('name_en')}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="slug">@lang('form.label.slug') @lang('form.label.optional') </label>
            <input name="slug" type="text" maxlength="50" class="form-control @error('slug') is-invalid @enderror" id="slug"  value="{{old('slug')}}">
            @error('slug')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


        <div class="form-group col-md-6">
            <label for="url">@lang('form.label.link') @lang('form.label.optional')</label>
            <input name="url" type="text" maxlength="255" class="form-control @error('url') is-invalid @enderror" id="url"  value="{{old('url')}}" accept="image/svg+xml">
            @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('layout.add section')</button>
</form>
