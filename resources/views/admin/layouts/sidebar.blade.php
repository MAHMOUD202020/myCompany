<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">

            {{--/////////// لوحة التحكم ///////////--}}
            <li class="menu">
                <a href="#dashboard" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-dashboard">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.dashboard')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="dashboard" data-parent="#accordionExample">
                    <li id="li-dashboard">
                        <a href="{{ route('admin.home')}}">@lang('layout.show')</a>
                    </li>
                </ul>
            </li>




            {{--/////////// المسئولين ///////////--}}
{{--            <li class="menu">--}}
{{--                <a href="#admins" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-admins">--}}
{{--                    <div class="">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>--}}
{{--                        <span>@lang('layout.admins')</span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <ul class="collapse submenu list-unstyled" id="admins" data-parent="#accordionExample">--}}
{{--                    <li id="li-admins">--}}
{{--                        <a href="{{ route('admin.admins.index')}}">@lang('layout.show admins')</a>--}}
{{--                    </li>--}}
{{--                    <li id="li-create">--}}
{{--                        <a href="{{ route('admin.admins.create')}}">@lang('layout.add Admin')</a>--}}
{{--                    </li>--}}
{{--                    <li id="li-trash">--}}
{{--                        <a href="{{ route('admin.admins.trash')}}">@lang('layout.trash')</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}


{{--            /////////// categories ///////////--}}
            <li class="menu">
                <a href="#categories" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-categories">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.categories')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="categories" data-parent="#accordionExample">
                    <li id="li-categories">
                        <a href="{{ route('admin.categories.index')}}">@lang('layout.show categories')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.categories.create')}}">@lang('layout.add category')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.categories.trash')}}">@lang('layout.trash')</a>
                    </li>
                    <li id="li-sort">
                        <a href="{{ route('admin.categories.sort.show')}}">@lang('layout.sort categories')</a>
                    </li>
                </ul>
            </li>

            {{--            /////////// partnsers ///////////--}}
            <li class="menu">
                <a href="#partners" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-partners">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.partners')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="partners" data-parent="#accordionExample">
                    <li id="li-partners">
                        <a href="{{ route('admin.partners.index')}}">@lang('layout.show partners')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.partners.create')}}">@lang('layout.add partner')</a>
                    </li>

                    <li id="li-sort">
                        <a href="{{ route('admin.partners.sort.show')}}">@lang('layout.sort partners')</a>
                    </li>
                </ul>
            </li>


            <!-- /////////// شرائح العرض /////////// -->
            <li class="menu">
                <a href="#sliders" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-sliders">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.sliders')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="sliders" data-parent="#accordionExample">
                    <li id="li-sliders">
                        <a href="{{ route('admin.sliders.index')}}">@lang('layout.show sliders')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.sliders.create')}}">@lang('layout.add slider')</a>
                    </li>
                </ul>
            </li>

            {{--/////////// المشاريع ///////////--}}
            <li class="menu">
                <a href="#projects" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-projects">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.projects')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="projects" data-parent="#accordionExample">
                    <li id="li-projects">
                        <a href="{{ route('admin.projects.index')}}">@lang('layout.show projects')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.projects.create')}}">@lang('layout.add project')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.projects.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>

            {{--/////////// المشاريع ///////////--}}
            <li class="menu">
                <a href="#products" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-products">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.products')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="products" data-parent="#accordionExample">
                    <li id="li-products">
                        <a href="{{ route('admin.products.index')}}">@lang('layout.show products')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.products.create')}}">@lang('layout.add project')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.products.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>




        </ul>

    </nav>

</div>
