@extends('layouts.app')

@section('title', '创建产品')

@push('styles')
    <link rel="stylesheet" href="{{ url('css/dropzone.css') }}">
@endpush

@push('scripts.header')
<script>
    var UPLOAD_IMAGE_URL = "{{ url('/products/upload') }}";
    window.onbeforeunload = function()
    {
        var unloads = document.getElementsByTagName("body")[0].value;
        if(unloads == null || unloads == ""){
            return "您确定要退出页面吗？所有改变将不会保存";
        }
    }
</script>

<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/lang/zh-cn/zh-cn.js"></script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-offset-1">
            @include('manage.flash-message')
            <div class="panel panel-success">
                <div class="panel-heading">
                    创建新产品
                </div>
                <div class="panel-body">
                    {{-- Product Create Form Start --}}
                    @include('manage.product.partials.form', [
                        'method' => 'POST',
                        'action_url' => url('/products/create'),
                        'action_button' => '创建',
                        'product' => new \App\Product
                    ])
                    {{-- Product Create Form End --}}
                </div>
            </div>
        </div>
        <div class="col-md-3">
            @include('products.partials.sidebar_latest')
            @include('products.partials.sidebar_hottest')
        </div>
    </div>
</div>
@stop

@section('footer-script')
    <script>
        ;(function(window) {
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
        })(window);
    </script>
@stop