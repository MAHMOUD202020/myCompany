@extends('admin.master')

@section('content')

    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="row">

                    <div class="col-xl-12  col-md-12">

                        <div class="mail-box-container">
                            <div class="mail-overlay"></div>


                            <div id="mailbox-inbox" class="accordion mailbox-inbox">


                                @include('admin.pages.messages.btnAction')

                                @include('admin.pages.messages.messageBox')

                                @include('admin.pages.messages.contentBox')

                            </div>

                        </div>

                    </div>


                </div>

            </div>
        </div>

    </div>

@endsection

@section('css')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/plugins/editors/quill/quill.snow.css')}}">--}}
    <link href="{{asset('assets/admin/css/apps/mailbox.css')}}" rel="stylesheet" type="text/css" />

{{--    <script src="{{asset('assets/admin/plugins/sweetalerts/promise-polyfill.js')}}"></script>--}}
{{--    <link href="{{asset('assets/admin/plugins/sweetalerts/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/admin/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />--}}
{{--    <link href="{{asset('assets/admin/plugins/notification/snackbar/snackbar.min.css')}}" rel="stylesheet" type="text/css" />--}}
@endsection

@section('js')
{{--    <script src="{{asset('assets/admin/js/ie11fix/fn.fix-padStart.js')}}"></script>--}}
{{--    <script src="{{asset('assets/admin/plugins/editors/quill/quill.js')}}"></script>--}}
    <script src="{{asset('assets/admin/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
{{--    <script src="{{asset('assets/admin/plugins/notification/snackbar/snackbar.min.js')}}"></script>--}}
    <script src="{{asset('assets/admin/js/apps/custom-mailbox.js')}}"></script>


<script>
    $(function (){

        $('.delete-message').on('click', function (e) {

            e.preventDefault();
            e.stopPropagation();
            $(this).parents('.mailInbox').hide(500)

            $.ajax({
                method:'delete',
                url:$(this).attr('href'),
            })
        })
    })
</script>
@endsection
