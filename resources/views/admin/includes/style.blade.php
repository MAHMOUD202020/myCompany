<link href="{{asset('assets/admin/css/loader.css')}}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

<link rel="stylesheet" href="{{asset("assets/admin/bootstrap/css/bootstrap-$dir.min.css")}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset("assets/admin/css/structure-$dir.css")}}">
{{--<link rel="stylesheet" href="{{asset('assets/admin/css/overwrite.css')}}">--}}

<link rel="shortcut icon" href="{{asset('favicon.ico')}}" />

<style>
    .d-flex{
        direction: {{$dir}};
    }
    .form-group label, label{
        color: black;
    }
    .layout-px-spacing .widget-content.widget-content-area{
        border: 1px solid;
        box-shadow: 0px 0px 17px #888ea8;
    }
</style>

@yield('css')
