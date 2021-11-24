@extends('admin.masterAuth')

@section('content')
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">@lang('form.label.login')</h1>
                        <p class="">@lang('form.label.login Admin')</p>

                        @include('admin.auth.form_login')
                        <div class="division mt-2">
                        </div>
                        <a  class="dropdown-item d-flex" href="{{ route('admin.lang.change' , 'ar')}}"><img width="25" src="{{asset('assets/admin/img/ar.png')}}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;العربية</span></a>
                        <a class="dropdown-item d-flex" href="{{ route('admin.lang.change' , 'en')}}"><img  width="25" src="{{asset('assets/admin/img/ca.png')}}" class="flag-width" alt="flag"> <span class="align-self-center">&nbsp;English</span></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
