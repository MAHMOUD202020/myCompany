<form method="post" action="{{ route('admin.partners.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name ar')</label>
            <input name="name_ar" type="text" maxlength="50" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="" value="{{old('name_ar')}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name en')</label>
            <input name="name_en" type="text" maxlength="50" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="" value="{{old('name_en')}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="url">@lang('form.label.link') (optional) </label>
            <input name="url" type="text" maxlength="255" class="form-control @error('url') is-invalid @enderror" id="url" placeholder="" value="{{old('url')}}">
            @error('url')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="icon">@lang('form.label.icon')</label>
            <input name="icon" type="file" maxlength="255" class="form-control @error('icon') is-invalid @enderror" id="icon" placeholder="@lang('form.label.user icon')" value="{{old('icon')}}" required>
            @error('icon')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3">Add Partner</button>
</form>
