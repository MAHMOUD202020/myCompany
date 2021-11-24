@extends('admin.master')

@section('breadcrumb')
    @if(!IS_TRASH)
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.newsletters')</span></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('admin.newsletters.index')}}">@lang('layout.newsletters')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.trash')</span></li>
    @endif
@endsection

@section('content')

    @include('admin.includes.modalBtnAction')

    {!! myDataTable_button() !!}



    {!! myDataTable_table([
        "id"           => 'id',
        "email"        => __('form.label.email'),
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
            name   :  ['id','email','created_at'],
            btn    :  {

                @if(!IS_TRASH)
                    @can('role' , 'category.destroy')
                    'delete': '{{ route('admin.newsletters.destroy' , '')}}'+'/{id}',
                    @endcan
                @else
                    @can('role' , 'category.restore')
                    'restore': '{{ route('admin.newsletters.restore' , '')}}'+'/{id}',
                    @endcan

                    @can('role' , 'category.finalDelete')
                    'delete': '{{ route('admin.newsletters.finalDelete' , '')}}'+'/{id}',
                    @endcan
                @endif
                'print': '#',

            }
        })
    </script>
@endsection
