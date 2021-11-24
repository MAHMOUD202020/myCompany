@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.blocks.index' , ['page' => $block->page])}}">@lang("layout.blocks")</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{$block->title}}</span></li>
    <li class="breadcrumb-item active" aria-current="page"><span>@lang('layout.items')</span></li>
@endsection

@section('content')

    @include('admin.includes.alert_success')

    <div class="bg-light p-3 mb-2"><h2>@lang('form.label.items block') {{$block->title}}</h2></div>

    @if($items->count())
        @foreach($items as $item)
            <div class="row bg-light pt-3 pb-3">
                <div class="col-md-12">
                    <div class="h2 text-center">@lang('form.label.title') : {{$item->title}}</div>
                </div>

                <div class="col-md-12">
                    <p>@lang('form.label.text') : {{$item->text}}</p>
                </div>

                <div class="col-md-12">
                    <p>@lang('form.label.icon') : {{$item->icon}}</p>
                </div>

                <div class="col mt-3">
                    <a href="{{route('admin.items.edit' , $item->id)}}" class="btn btn-success">@lang('form.label.edit data')</a>

                    <form method="post" action="{{route('admin.items.destroy' , $item->id)}}" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <input type="hidden" name="id" value="{{$item->id}}">
                        <button type="submit"  class="btn btn-danger">@lang('form.label.delete')</button>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="alert alert-warning">@lang('form.label.not any items')</div>
    @endif


@endsection

