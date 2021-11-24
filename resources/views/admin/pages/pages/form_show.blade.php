<form method="post" action="{{ route('admin.pages.update'  , $page->id)}}" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name_ar')</label>
            <input name="name_ar" type="text" maxlength="150" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar"  value="{{old('name_ar' , $page->name_ar)}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name_en')</label>
            <input name="name_en" type="text" maxlength="150" class="form-control @error('name_en') is-invalid @enderror" id="name_en"  value="{{old('name_en', $page->name_en)}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="slug">@lang('form.label.slug')</label>
            <input name="slug" type="text" maxlength="100" class="form-control @error('slug') is-invalid @enderror" id="slug"  value="{{old('slug' , $page->slug)}}" required>
            @error('slug')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="cover">@lang('form.label.cover') @lang('form.label.optional')</label>
            @if ($page->cover)
                <div><img height="60" src="{{asset("assets/web/images/pages/$page->cover")}}" alt=""></div>
            @endif
            <input name="cover" maxlength="255" type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" placeholder="@lang('form.label.user cover')" value="{{old('cover', $page->cover)}}">
            @error('cover')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="description_ar">@lang('form.label.description_ar') @lang('form.label.optional')</label>
            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar"> {{old('description_ar', $page->description_ar)}} </textarea>
            @error('description_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="description_en">@lang('form.label.description_en') @lang('form.label.optional')</label>
            <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" id="description_en">{{old('description_en', $page->description_en)}}</textarea>
            @error('description_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('form.label.update page')</button>
</form>
