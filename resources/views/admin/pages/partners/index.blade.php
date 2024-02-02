@extends('admin.master')

@section('breadcrumb')
    @if(!IS_TRASH)
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.partners')</span></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('admin.partners.index')}}">@lang('layout.partners')</a></li>
        <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.trash')</span></li>
    @endif
@endsection

@section('content')

    @include('admin.includes.modalBtnAction' , ['big' => true])

    {!! myDataTable_button([
        __('layout.add partner') => route('admin.partners.create'),
      ]) !!}



    {!! myDataTable_table([
        "id"         => 'id',
        "name_ar"    => __('form.label.name_ar'),
        "name_en"    => __('form.label.name_en'),
        "icon"    => __('form.label.icon'),
        "url"    => [__('form.label.link') . ' ' . '(optional)', true, true, true, 'd-none'],
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


        colLg = 6;

        myDataTableColumns({
            name   :  ['id', 'name_ar', 'name_en', 'icon', 'url',  'updated_at', 'created_at'],
            class  : {'updated_at': 'notEdit' , 'created_at': 'notEdit', 'url': 'd-none'},
            file: {'icon': '{{asset('assets/web/images/partners/{icon}')}}'},
            btn    :  {

                @can('role' , 'partner.update')
                'edit'         : '{{ route('admin.partners.update' , '')}}'+'/{id}',
                @endcan

                @if(!IS_TRASH)

                    @can('role' , 'partner.destroy')
                    'delete'       : '{{ route('admin.partners.destroy' , '')}}'+'/{id}',
                    @endcan
                @else
                    @can('role' , 'partner.restore')
                    'restore'      : '{{ route('admin.partners.restore' , '')}}'+'/{id}',
                    @endcan

                    @can('role' , 'partner.finalDelete')
                    'delete'       : '{{ route('admin.partners.finalDelete' , '')}}'+'/{id}',
                    @endcan
                @endif
                'print'        : '#',

            }
        })
    </script>
@endsection
