@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.staticPages')</span></li>
@endsection

@section('content')

    @include('admin.includes.alert_success')


    @foreach($blocks as $block)

        <div class="row bg-light pt-3 pb-3">


            <div class="col-md-6">
                <div class="h2 text-center">{{$block->title}}</div>

                <p>{{$block->text}}</p>

                <hr>

                @if($block->btn_text)
                    <p>@lang('form.label.btn text') : {{$block->btn_text}}</p>
                @endif

                @if($block->url)
                    <p>@lang('form.label.link') : {{$block->url}}</p>
                @endif
                <div class="col-md-12">
                    <div class="item-img" style='background-image: url("{{asset("assets/web/images/slider/$block->img")}}")'></div>
                </div>

            </div>

            <div class="col">
                <a href="{{route('admin.blocks.edit' , $block->id)}}" class="btn btn-success">@lang('form.label.edit data')</a>

                <a href="{{route('admin.items.index', ['block' => $block->id])}}" class="btn btn-primary {{!$block->is_container ? 'disabled' : ''}}">@lang('form.label.show items')</a>

                <a href="{{route('admin.items.create', ['block' => $block->id])}}" class="btn btn-info {{!$block->is_container ? 'disabled' : ''}}">@lang('form.label.add item')</a>

                <a href="{{route('admin.blocks.toggleView' , $block->id)}}" class="btn {{$block->is_active ? 'btn-danger' : 'btn-primary'}}">{{$block->is_active ?__('form.label.hide') : __('form.label.show')}}</a>
            </div>
        </div>

    @endforeach

@endsection

