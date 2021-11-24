<!-- Start Navbar Area -->
<div class="navbar-area">
    <div class="fria-responsive-nav">
        <div class="container">
            <div class="fria-responsive-menu">
                <div class="logo">
                    <a href="{{asset('/')}}">
                        <img src="{{asset('assets/web/img/logo.png')}}" alt="logo">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="fria-nav">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{asset('/')}}">
                    <img src="{{asset('assets/web/img/logo.png')}}" alt="logo">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav">

                        @foreach($sections as $section)
                            <li class="nav-item">
                                <a href="{{$section->url}}" class="nav-link {{$section->url === request()->url() ? 'active' : ''}}">
                                    {{$section->name}}
                                    @if ($section->subCategories->count() > 0)
                                        <i class='bx bx-chevron-down'></i>
                                    @endif
                                </a>

                                @if ($section->subCategories->count() > 0)
                                    <ul class="dropdown-menu">

                                        @foreach($section->subCategories as $subCategories)
                                            <li class="nav-item">
                                                <a href="{{$subCategories->url}}" class="nav-link">
                                                    {{$subCategories->name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach

                            <li class="nav-item bg-light">
                                @if ($dir === 'rtl')
                                    <a  href="{{route('web.lang.change' , 'en')}}" class="nav-link" style="padding-left: 8px">
                                        english
                                    </a>

                                @else
                                    <a href="{{route('web.lang.change' , 'ar')}}" class="nav-link d-block" style="padding-right: 8px; width: 50px">
                                        عربي
                                    </a>
                                @endif

                            </li>
                    </ul>

                    <div class="others-options">
                        <div class="burger-menu">
                        </div>
                    </div>

                </div>
            </nav>
        </div>
    </div>
</div>
<!-- End Navbar Area -->
