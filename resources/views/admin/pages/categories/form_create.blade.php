<form method="post" action="{{ route('admin.categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name ar')</label>
            <input name="name_ar" type="text" maxlength="50" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="اسم التصنيف باللغة العربية" value="{{old('name_ar')}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name en')</label>
            <input name="name_en" type="text" maxlength="50" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="اسم التصنيف باللغة الانجليزية" value="{{old('name_en')}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="slug">@lang('form.label.slug') @lang('form.label.optional')</label>
            <input name="slug" type="text" maxlength="50" class="form-control @error('slug') is-invalid @enderror" id="slug"  value="{{old('slug')}}">
            @error('slug')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="parent_id">@lang('form.label.section')</label>
            <select name="parent_id" class="form-control @error('parent_id') is-invalid @enderror" id="parent_id">
                @foreach($sections as $section)
                    <option {{old('parent_id') == $section->id ? 'selected' : ''}}
                            value="{{$section->id}}">{{$section["name_$lang"]}}
                    </option>
                @endforeach
            </select>
            @error('parent_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="icon">@lang('form.label.icon svg') @lang('form.label.optional')</label>
            <input name="icon" type="file" maxlength="255" class="form-control @error('icon') is-invalid @enderror" id="icon"  value="{{old('icon')}}" accept="image/svg+xml">
            @error('icon')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="url">@lang('form.label.link')</label>
            <input name="url" type="text" maxlength="255" class="form-control @error('url') is-invalid @enderror" id="url"  value="{{old('url')}}" accept="image/svg+xml">
            @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('layout.add category')</button>
</form>
