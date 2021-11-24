<link href="{{asset('assets/admin/css/loader.css')}}" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

<link rel="stylesheet" href="{{asset("assets/admin/bootstrap/css/bootstrap-$dir.min.css")}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/plugins/perfect-scrollbar/perfect-scrollbar.css')}}">
<link rel="stylesheet" href="{{asset('assets/admin/css/authentication/form-2.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/forms/theme-checkbox-radio.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/forms/switches.css')}}">
<link rel="shortcut icon" href="{{asset('assets/admin/images/favicon.png')}}" />

<style>
    .d-flex{
        direction: {{$dir}};
    }
</style>

@yield('css')
