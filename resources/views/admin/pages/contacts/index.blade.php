@extends('admin.master')


@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.contacts')</span></li>
@endsection

@section('content')

    @include('admin.includes.modalBtnAction', ['big' => true])

    {!! myDataTable_button([
        __('layout.add contact') => route('admin.contacts.create'),
      ]) !!}

    {!! myDataTable_table([
        "id"         => 'id',
        "title_ar"   => __('form.label.title ar'),
        "title_en"   => __('form.label.title en'),
        "value"      => __('form.label.value'),
        "icon"       => __('form.label.icon'),
        "type"       => __('form.label.type'),
    ]) !!}

@endsection


@section('css')
    <link rel="stylesheet" href="{{asset("assets/myDataTable/data.css")}}">
@endsection

@section('js')
    <script src="{{asset("assets/myDataTable/data.js")}}"></script>
    <script>

        colLg = 6;

        let type = {'contact':'@lang('form.label.type contact')', 'social':'@lang('form.label.type social')'}

        myDataTableColumns({
            name  :  ['id', 'title_ar', 'title_en', 'value', 'icon' , 'type'],
            class : {'updated_at': 'notEdit' , 'created_at': 'notEdit'},
            alias  : {type},
            select : {type},
            btn   :  {

                @can('role' , 'contact.update')
                'edit': '{{ route('admin.contacts.update' , '')}}'+'/{id}',
                @endcan

                @can('role' , 'contact.destroy')
                'delete': '{{ route('admin.contacts.destroy' , '')}}'+'/{id}',
                @endcan
                'print': '#',
            }
        })
    </script>
@endsection
