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


            {{--/////////// المستخدمين ///////////--}}
            <li class="menu">
                <a href="#users" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-users">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.users')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="users" data-parent="#accordionExample">
                    <li id="li-users">
                        <a href="{{ route('admin.users.index')}}">@lang('layout.show users')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.users.create')}}">@lang('layout.add user')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.users.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>

            {{--            /////////// الصلاحيات ///////////--}}
            <li class="menu">
                <a href="#roles" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-roles">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.roles')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="roles" data-parent="#accordionExample">
                    <li id="li-roles">
                        <a href="{{ route('admin.roles.index')}}">@lang('layout.show roles')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.roles.create')}}">@lang('layout.add role')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.roles.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>

            {{--/////////// المسئولين ///////////--}}
            <li class="menu">
                <a href="#admins" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-admins">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.admins')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="admins" data-parent="#accordionExample">
                    <li id="li-admins">
                        <a href="{{ route('admin.admins.index')}}">@lang('layout.show admins')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.admins.create')}}">@lang('layout.add Admin')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.admins.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>

{{--            /////////// section///////////--}}
            <li class="menu">
                <a href="#sections" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-sections">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.sections')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="sections" data-parent="#accordionExample">
                    <li id="li-sections">
                        <a href="{{ route('admin.sections.index')}}">@lang('layout.show sections')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.sections.create')}}">@lang('layout.add section')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.sections.trash')}}">@lang('layout.trash')</a>
                    </li>
                    <li id="li-sort">
                        <a href="{{ route('admin.sections.sort.show')}}">@lang('layout.sort sections')</a>
                    </li>
                </ul>
            </li>

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

            {{--/////////// الصفحات الثابتة ///////////--}}
            <li class="menu">
                <a href="#staticPages" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-staticPages">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.blocks')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="staticPages" data-parent="#accordionExample">
                    <li id="li-staticPages">
                        <a href="{{ route('admin.blocks.index')}}">@lang('layout.show')</a>
                    </li>
                </ul>
            </li>

            {{--/////////// الخدمات ///////////--}}
            <li class="menu">
                <a href="#services" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-services">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.services')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="services" data-parent="#accordionExample">
                    <li id="li-services">
                        <a href="{{ route('admin.services.index')}}">@lang('layout.show services')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.services.create')}}">@lang('layout.add service')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.services.trash')}}">@lang('layout.trash')</a>
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


            {{--/////////// الصفحات ///////////--}}
            <li class="menu">
                <a href="#pages" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-pages">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.pages')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="pages" data-parent="#accordionExample">
                    <li id="li-pages">
                        <a href="{{ route('admin.pages.index')}}">@lang('layout.show pages')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.pages.create')}}">@lang('layout.add page')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.pages.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>


            {{--/////////// وسائل التواصل ///////////--}}
            <li class="menu">
                <a href="#contacts" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-contacts">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.contacts')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="contacts" data-parent="#accordionExample">
                    <li id="li-contacts">
                        <a href="{{ route('admin.contacts.index')}}">@lang('layout.show contacts')</a>
                    </li>
                    <li id="li-create">
                        <a href="{{ route('admin.contacts.create')}}">@lang('layout.add contact')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.contacts.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>


            {{--/////////// النشرة البريديه ///////////--}}
            <li class="menu">
                <a href="#newsletters" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-newsletters">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>
                        <span>@lang('layout.newsletters')</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                <ul class="collapse submenu list-unstyled" id="newsletters" data-parent="#accordionExample">
                    <li id="li-newsletters">
                        <a href="{{ route('admin.newsletters.index')}}">@lang('layout.show newsletters')</a>
                    </li>
                    <li id="li-trash">
                        <a href="{{ route('admin.newsletters.trash')}}">@lang('layout.trash')</a>
                    </li>
                </ul>
            </li>

{{--            --}}{{--/////////// الرسائل ///////////--}}
{{--            <li class="menu">--}}
{{--                <a href="#contact" data-toggle="collapse" data-active="false" aria-expanded="false" class="dropdown-toggle" id="toggle-contact">--}}
{{--                    <div class="">--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-cpu"><rect x="4" y="4" width="16" height="16" rx="2" ry="2"></rect><rect x="9" y="9" width="6" height="6"></rect><line x1="9" y1="1" x2="9" y2="4"></line><line x1="15" y1="1" x2="15" y2="4"></line><line x1="9" y1="20" x2="9" y2="23"></line><line x1="15" y1="20" x2="15" y2="23"></line><line x1="20" y1="9" x2="23" y2="9"></line><line x1="20" y1="14" x2="23" y2="14"></line><line x1="1" y1="9" x2="4" y2="9"></line><line x1="1" y1="14" x2="4" y2="14"></line></svg>--}}
{{--                        <span>@lang('layout.messages')</span>--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--                <ul class="collapse submenu list-unstyled" id="contact" data-parent="#accordionExample">--}}
{{--                    <li id="li-contact">--}}
{{--                        <a href="{{ route('admin.contact.index')}}">@lang('layout.show messages')</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}




        </ul>

    </nav>

</div>
