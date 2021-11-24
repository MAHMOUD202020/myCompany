<form method="post" action="{{ route('admin.contacts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="title_ar">@lang('form.label.title ar')</label>
            <input maxlength="50" name="title_ar" type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar"  value="{{old('title_ar')}}" required>
            @error('title_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="title_en">@lang('form.label.title en')</label>
            <input maxlength="50" name="title_en" type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" value="{{old('title_en')}}" required>
            @error('title_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="value">@lang('form.label.value')</label>
            <input maxlength="255" name="value" type="text" class="form-control @error('value') is-invalid @enderror" id="value" value="{{old('value')}}" required>
            @error('value')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="icon">@lang('form.label.icon')</label>
            <input maxlength="50" name="icon" type="text" class="form-control @error('icon') is-invalid @enderror" id="icon" value="{{old('icon')}}">
            @error('icon')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="type">@lang('form.label.type')</label>
            <select name="type" type="text" class="form-control @error('type') is-invalid @enderror" id="type">
                <option value="contact">@lang('form.label.type contact')</option>
                <option value="social">@lang('form.label.type social')</option>
            </select>
            @error('type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('layout.add contact')</button>

</form>
