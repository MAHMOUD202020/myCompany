@extends('admin.master')

@section('breadcrumb')
    @if(!IS_TRASH)
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.categories')</span></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('admin.categories.index')}}">@lang('layout.categories')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.trash')</span></li>
    @endif
@endsection

@section('content')

    @include('admin.includes.modalBtnAction' , ['big' => true])

    {!! myDataTable_button([
        __('layout.add category') => route('admin.categories.create'),
      ]) !!}



    {!! myDataTable_table([
        "id"         => 'id',
        "name_ar"    => __('form.label.name ar'),
        "name_en"    => __('form.label.name en'),
        "type"    => __('form.label.type'),
        "updated_at" => __('form.label.updated_at'),
        "created_at" => __('form.label.created_at'),
    ]) !!}

@endsection

@section('css')
    <link rel="stylesheet" href="{{asset("assets/myDataTable/data.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/myDataTable/data.js")}}"></script>
    <script>


        colLg = 12;

        myDataTableColumns({
            name   :  ['id', 'name_ar', 'name_en', 'type', 'updated_at', 'created_at'],
            class  : {'updated_at': 'notEdit' , 'created_at': 'notEdit'},
            select : {'type': {"products": "products", 'projects' : "projects"}},
            btn    :  {

                @can('role' , 'category.update')
                'edit'         : '{{ route('admin.categories.update' , '')}}'+'/{id}',
                @endcan

                @if(!IS_TRASH)

                    @can('role' , 'category.destroy')
                    'delete'       : '{{ route('admin.categories.destroy' , '')}}'+'/{id}',
                    @endcan
                @else
                    @can('role' , 'category.restore')
                    'restore'      : '{{ route('admin.categories.restore' , '')}}'+'/{id}',
                    @endcan

                    @can('role' , 'category.finalDelete')
                    'delete'       : '{{ route('admin.categories.finalDelete' , '')}}'+'/{id}',
                    @endcan
                @endif
                'print'        : '#',

            }
        })
    </script>
@endsection
