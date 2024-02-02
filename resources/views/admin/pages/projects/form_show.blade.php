<form method="post" action="{{ route('admin.projects.update'  , $project->id)}}" enctype="multipart/form-data">
    @csrf

    @method('put')
    <div class="form-row mb-4">

        <div class="form-group col-md-6">
            <label for="name_ar">@lang('form.label.name_ar')</label>
            <input name="name_ar" type="text" maxlength="150" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar"  value="{{old('name_ar' , $project->name_ar)}}" required>
            @error('name_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="name_en">@lang('form.label.name_en')</label>
            <input name="name_en" type="text" maxlength="150" class="form-control @error('name_en') is-invalid @enderror" id="name_en"  value="{{old('name_en', $project->name_en)}}" required>
            @error('name_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="sort">@lang('form.label.sort')</label>
            <input name="sort" type="number" maxlength="255" class="form-control @error('sort') is-invalid @enderror" id="sort" value="{{old('sort' , $project->sort)}}" required>
            @error('sort')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="category_id">@lang('form.label.categories')</label>
            <select name="category_id"  class="form-control @error('category_id') is-invalid @enderror" id="category_id" required>
                @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ old('category_id', $project->category_id) != $category->id ?: 'selected' }}>{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="shortDescription_ar">@lang('form.label.shortDescription_ar')</label>
            <textarea rows="3" maxlength="1000" name="shortDescription_ar" class="form-control  @error('shortDescription_ar') is-invalid @enderror" id="shortDescription_ar"> {{old('shortDescription_ar', $project->shortDescription_ar)}} </textarea>
            @error('shortDescription_ar')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="shortDescription_en">@lang('form.label.shortDescription_en') </label>
            <textarea rows="3" maxlength="1000" name="shortDescription_en" class="form-control  @error('shortDescription_en') is-invalid @enderror" id="shortDescription_en"> {{old('shortDescription_en', $project->shortDescription_en)}} </textarea>
            @error('shortDescription_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>



        <div class="form-group col-md-12">
            <label for="description_ar">@lang('form.label.description_ar') @lang('form.label.optional')</label>
            <textarea name="description_ar" class="form-control tiny-textarea @error('description_ar') is-invalid @enderror" id="description_ar"> {{old('description_ar', $project->description_ar)}} </textarea>
            @error('description_ar')<span class="invalid-feedback"  role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-12">
            <label for="description_en">@lang('form.label.description_en') @lang('form.label.optional')</label>
            <textarea name="description_en" class="form-control tiny-textarea @error('description_en') is-invalid @enderror" id="description_en"> {{old('description_en', $project->description_en)}} </textarea>
            @error('description_en')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


        <div class="form-group col-md-6">
            <label for="img">@lang('form.label.img') @lang('form.label.optional')</label>
            @if ($project->img)
                <div><img height="60" src="{{asset("assets/web/images/projects/$project->img")}}" alt=""></div>
            @endif
            <input name="img" maxlength="255" type="file" class="form-control @error('img') is-invalid @enderror" id="img" placeholder="@lang('form.label.user img')" value="{{old('img', $project->img)}}">
            @error('img')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="gallery">gallery @lang('form.label.optional')</label>
            @if ($project->gallery)
                @foreach(json_decode($project->gallery) as $img)
                    <img  height="60" src="{{$img}}" alt="">
                @endforeach
            @endif
            <input name="gallery[]" multiple maxlength="255" type="file" class="form-control @error('gallery') is-invalid @enderror" id="gallery"  >
            @error('gallery')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>

        <div class="form-group col-md-6">
            <label for="cover">@lang('form.label.cover') @lang('form.label.optional')</label>
            @if ($project->cover)
                <div><img height="60" src="{{asset("assets/web/images/projects/$project->cover")}}" alt=""></div>
            @endif
            <input name="cover" maxlength="255" type="file" class="form-control @error('cover') is-invalid @enderror" id="cover" placeholder="@lang('form.label.user cover')" value="{{old('cover', $project->cover)}}">
            @error('cover')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
        </div>


    </div>

    <button type="submit" class="btn btn-primary mt-3">@lang('form.label.update project')</button>
</form>
