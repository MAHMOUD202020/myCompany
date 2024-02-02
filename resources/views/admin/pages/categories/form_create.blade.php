<form method="post" action="{{ route('admin.categories.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name ar')</label>
            <input name="name_ar" type="text" maxlength="50" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="" value="{{old('name_ar')}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name en')</label>
            <input name="name_en" type="text" maxlength="50" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="" value="{{old('name_en')}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-6">
            <label for="type">Type</label>
            <select name="type" type="text" class="form-control @error('type') is-invalid @enderror" id="type" required>
                <option value="products">
                    Products
                </option>
                <option value="projects">
                    Projects
                </option>
            </select>
            @error('type')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('layout.add category')</button>
</form>
