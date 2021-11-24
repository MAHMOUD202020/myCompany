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
</style>

@yield('css')
