@extends('admin.master')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index')}}">@lang('layout.products')</a></li>
    <li class="breadcrumb-item active" aria-current="page"><span>{{$product["name_".app()->getLocale()]}}</span></li>
@endsection

@section('content')

    <div class="account-settings-container layout-top-spacing">

        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">

                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        @include('admin.includes.alert_success')

                        <div class="widget-content widget-content-area">
                            @include('admin.pages.products.form_show')
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
    <script src="https://cdn.tiny.cloud/1/if7kw4u3a5pqt7tukleap3o7c2ctwzn56jhnxdsiezi26po3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>

        tinymce.init({
            selector: '#description_ar , #description_en',
            plugins: 'anchor autolink charmap  link image lists searchreplace table  wordcount',
            toolbar: 'image undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            directionality: 'rtl',
            mergetags_list: [
                { value: 'First.Name', title: 'First Name' },
                { value: 'Email', title: 'Email' },
            ],
            image_title: true,
            automatic_uploads: true,
            images_upload_url: '{{route('admin.uploadImage')}}',
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
