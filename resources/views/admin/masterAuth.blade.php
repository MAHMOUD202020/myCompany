@php($dir = app()->getLocale() === 'ar' ? 'rtl': 'ltr')

<!DOCTYPE html >
<html lang="{{app()->getLocale()}}" dir="{{$dir}}">

<head>

    <!-- ///// meta ///// -->
    @include('admin.includes.meta')

    <title>elprof - admin</title>

    <!-- ///// style css ///// -->
    @include('admin.includes.styleAuth')

</head>

    <body class="{{$dir}} form">
         <div class="main-wrapper">

             <!-- ****** start page ****** -->
             <div class="page-wrapper">


                 <!-- start content -->
                 <div class="page-content">

                     @yield('content')

                 </div>
                 <!-- end content -->

             </div>
         <!-- ****** end page ****** -->
         </div>
    </body>


@include('admin.includes.script')

<script src="{{asset('assets/admin/js/authentication/form-2.js')}}"></script>

</html>
