@extends('admin.master')

@section('breadcrumb')
    @if(!IS_TRASH)
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.pages')</span></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('admin.pages.index')}}">@lang('layout.pages')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.trash')</span></li>
    @endif
@endsection

@section('content')


    {!! myDataTable_button([
        __('layout.add page') => route('admin.pages.create'),
      ]) !!}



    {!! myDataTable_table([
        "id"           => 'id',
        "name"         => __('form.label.name'),
        "slug"         => __('form.label.slug'),
        "updated_at"   => __('form.label.updated_at'),
        "created_at"   => __('form.label.created_at'),
    ]) !!}

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/myDataTable/data.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/myDataTable/data.js")}}"></script>
    <script>

        myDataTableColumns({
            name   :  ['id', 'name', 'slug', 'updated_at', 'created_at'],
            btn    :  {

                'edit'         : '{{ route('admin.pages.update' , '')}}'+'/{id}',

                @if(!IS_TRASH)
                    @can('role' , 'category.destroy')
                    'delete': '{{ route('admin.pages.destroy' , '')}}'+'/{id}',
                    @endcan
                    'view': ['{{ route('web.page.show' , '')}}'+'/{slug}', 'عرض الصفحة'],

                @else
                    @can('role' , 'category.restore')
                    'restore': '{{ route('admin.pages.restore' , '')}}'+'/{id}',
                    @endcan

                    @can('role' , 'category.finalDelete')
                    'delete': '{{ route('admin.pages.finalDelete' , '')}}'+'/{id}',
                    @endcan
                @endif

                'print'        : '#',

            }
        })

        $('body').on('click' , '.dataEdit', function (e){
            e.preventDefault()
            location.href = $(this).attr('href')
        })
    </script>
@endsection
