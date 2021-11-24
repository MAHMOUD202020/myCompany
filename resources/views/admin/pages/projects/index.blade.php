@extends('admin.master')

@section('breadcrumb')
    @if(!IS_TRASH)
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.projects')</span></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('admin.projects.index')}}">@lang('layout.projects')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.trash')</span></li>
    @endif
@endsection

@section('content')


    {!! myDataTable_button([
        __('layout.add project') => route('admin.projects.create'),
      ]) !!}



    {!! myDataTable_table([
        "id"           => 'id',
        "name"         => __('form.label.name'),
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
            name   :  ['id', 'name', 'updated_at', 'created_at'],
            btn    :  {

                'edit'         : '{{ route('admin.projects.update' , '')}}'+'/{id}',

                @if(!IS_TRASH)
                    @can('role' , 'category.destroy')
                    'delete'       : '{{ route('admin.projects.destroy' , '')}}'+'/{id}',
                    @endcan
                @else
                    @can('role' , 'category.restore')
                    'restore'      : '{{ route('admin.projects.restore' , '')}}'+'/{id}',
                    @endcan

                    @can('role' , 'category.finalDelete')
                    'delete'       : '{{ route('admin.projects.finalDelete' , '')}}'+'/{id}',
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
