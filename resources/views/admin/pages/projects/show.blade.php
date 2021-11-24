@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.projects.index')}}">@lang('layout.projects')</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{$project["name_".app()->getLocale()]}}</span></li>
@endsection

@section('content')

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        @include('admin.includes.alert_success')

                        <div class="widget-content widget-content-area">
                            @include('admin.pages.projects.form_show')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')

    <script src="{{asset('assets/admin/plugins/bootstrap-maxlength/bootstrap-maxlength.js')}}"></script>

    <script src="{{asset('assets/admin/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script src='https://cdn.tiny.cloud/1/jj3v8hawt3vfkwkos9o6imcflmz0n20feztjejosztf38fco/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: '#description_ar , #description_en',

            image_class_list: [
                {title: 'img-responsive', value: 'img-responsive'},
            ],
            height: 500,
            setup: function (editor) {
                editor.on('init change', function () {
                    editor.save();
                });
            },
            plugins: [
                "advlist autolink lists past image charmap print preview anchor",
                "searchreplace visualblocks code fullscreen",
                "insertdatetime media table contextmenu paste imagetools"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
            content_style: "body p { margin: 1rem auto; }",

            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{route('admin.projects.uploadImage')}}',
            file_picker_types: 'image',
            file_picker_callback: function(cb, value, meta) {
                var input = document.createElement('input');
                input.setAttribute('type', 'file');
                input.setAttribute('accept', 'image/*');
                input.onchange = function() {
                    var file = this.files[0];

                    var reader = new FileReader();
                    reader.readAsDataURL(file);
                    reader.onload = function () {
                        var id = 'blobid' + (new Date()).getTime();
                        var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                        var base64 = reader.result.split(',')[1];
                        var blobInfo = blobCache.create(id, file, base64);
                        blobCache.add(blobInfo);
                        cb(blobInfo.blobUri(), { title: file.name });
                    };
                };
                input.click();
            }
        });
    </script>

    <script>
        $('input').maxlength({
            threshold: 40,
        });

    </script>

@endsection
