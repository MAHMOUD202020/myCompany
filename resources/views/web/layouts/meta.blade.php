<meta charset="utf-8">


<meta name="title" content="{{$title}}">
<meta name="description" content="{{$description}}">
<meta name="keywords" content="@isset($keywords_seo) {{$keywords_seo}} @else برمجة,نظم,معلومات,هاتف,اندرويد,ios,تطبيقات الهاتف,تطبيقات الويب  @endif">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="Arabic">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="">
<meta property="og:title" content="{{$title}}">
<meta property="og:description" content="{{$description}}">
<meta property="og:image" content="{{$img}}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="https://twitter.com/StoreMeral">
<meta property="twitter:title" content="{{$title}}">
<meta property="twitter:description" content="{{$description}}">
<meta property="twitter:image" content="{{$img}}">

<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="icon" href="{{asset('assets/web/img/logo-icon.png')}}">
