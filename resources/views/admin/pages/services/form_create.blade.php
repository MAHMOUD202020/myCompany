<form method="post" action="{{ route('admin.services.store')}}" enctype="multipart/form-data">
    @csrf

    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name_ar')</label>
            <input name="name_ar" type="text" maxlength="150" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar"  value="{{old('name_ar')}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name_en')</label>
            <input name="name_en" type="text" maxlength="150" class="form-control @error('name_en') is-invalid @enderror" id="name_en"  value="{{old('name_en')}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="icon">@lang('form.label.icon')</label>
            <input name="icon" type="text" maxlength="50" class="form-control @error('icon') is-invalid @enderror" id="icon" value="{{old('icon')}}" required>
            @error('icon')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="sort">@lang('form.label.sort')</label>
            <input name="sort" type="number" maxlength="255" class="form-control @error('sort') is-invalid @enderror" id="sort" value="{{old('sort' , 1)}}" required>
            @error('sort')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="shortDescription_ar">@lang('form.label.shortDescription_ar')</label>
            <input name="shortDescription_ar" type="text" maxlength="150" class="form-control @error('shortDescription_ar') is-invalid @enderror" id="shortDescription_ar" value="{{old('shortDescription_ar')}}" required>
            @error('shortDescription_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="shortDescription_en">@lang('form.label.shortDescription_en')</label>
            <input name="shortDescription_en" type="text" maxlength="150" class="form-control @error('shortDescription_en') is-invalid @enderror" id="shortDescription_en" value="{{old('shortDescription_en')}}" required>
            @error('shortDescription_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


        <div class="form-group col-md-12">
            <label for="description_ar">@lang('form.label.description_ar') @lang('form.label.optional')</label>
            <textarea name="description_ar" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar"> {{old('description_ar')}} </textarea>
            @error('description_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="description_en">@lang('form.label.description_en') @lang('form.label.optional')</label>
            <textarea name="description_en" class="form-control @error('description_en') is-invalid @enderror" id="description_en"> {{old('description_en')}} </textarea>
            @error('description_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="cover">@lang('form.label.cover')</label>
            <input name="cover" type="file" maxlength="255" class="form-control @error('cover') is-invalid @enderror" id="cover" placeholder="@lang('form.label.user cover')" value="{{old('cover')}}" required>
            @error('cover')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('layout.add service')</button>
</form>
