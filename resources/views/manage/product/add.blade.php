@extends('manage.app')

@section('title', '新增产品')

@push('styles')
<link rel="stylesheet" href="{{ url('css/dropzone.css') }}">
@endpush

@push('scripts.header')
    <script>
        var UPLOAD_IMAGE_URL = "{{ url('/products/upload') }}";
    </script>
    <script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/lang/zh-cn/zh-cn.js"></script>
@endpush

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>新增产品</h2>
        <div class="manage-actions">
            <div class="col-lg-10">
            @include('manage.product.partials.form', [
             'method' => 'POST',
             'action_url' => url('/manage/product/add'),
             'action_button' => '新建',
             'product' => new \App\Product])
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            'use strict';

            var ue = UE.getEditor('editor');
            Dropzone.options.dropzoneForm = {
                init: function () {
                    this.on('success', function (file, data) {
                        if (data.status == "ok") {
                            ue.execCommand('insertHtml', '<img src="' + data.url + '" />');
                        }
                    });
                },
                paramName: "photo",
                maxFilesize: 3, // MB
                acceptedFiles: 'image/*',
                dictDefaultMessage: "可拖拽图片至此或点击来上传",
                dictFileTooBig: "上传失败, 图片大小不可超过@{{maxFilesize}}MB",
                dictInvalidFileType: "文件类型错误"
            };

        });
    </script>
@endsection