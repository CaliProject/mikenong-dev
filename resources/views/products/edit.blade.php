@extends('layouts.app')

@section('title', '编辑产品')

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
            <div class="col-md-8 col-offset-2">
                @include('manage.flash-message')
                <div class="panel panel-success">
                    <div class="panel-heading">
                        编辑产品
                    </div>
                    <div class="panel-body">
                        {{-- Product Edit Form Start --}}
                        @include('manage.product.partials.form', [
                         'method' => 'POST',
                         'action_url' => action('ProductsController@updateProduct', ["id" => $product->id]),
                         'action_button' => '更新'])
                        {{-- Product Edit Form End --}}
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                @include('products.partials.sidebar_latest')
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        ;(function(window) {
            'use strict';

            var ue = UE.getEditor('editor');

            setTimeout(function () {
                ue.execCommand('insertHtml', '{!! addslashes($product->description) !!}');
            }, 500);

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
@endsection