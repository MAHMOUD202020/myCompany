@php($dir = app()->getLocale() === 'ar' ? 'rtl': 'ltr')

<!doctype html>
<html lang="ar" dir="{{$dir}}">
<head>

    @php($title = isset($title_seo) ? "$title_seo | شركة البروف el prof company " : 'شركة البروف el prof company')
    @php($description = isset($description_seo) ? $description_seo : "شركة البروف للبرمجة وخدمات  تكنولوجيا المعلومات")
    @php($img =  isset($img_seo) ? $img_seo : asset('assets/web/img/logo.png'))

    @include('web.layouts.meta')

    <title>{{$title}}</title>

    @include('web.layouts.style')

    @yield('css')

</head>

<body>

    @include('web.layouts.preloader')

    @include('web.layouts.navbar')


    <!-- start content -->
    @yield('content')
    <!-- end content -->

    @include('web.layouts.footer')

    @include('web.layouts.script')

    @yield('js')

</body>

</html>
