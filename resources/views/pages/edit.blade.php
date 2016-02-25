@extends('layouts.app')

@section('title', '编辑关于页面')

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
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-offset-1">
                @include('manage.flash-message')
                <div class="panel panel-success">
                    <div class="panel-heading">
                        编辑关于页面
                    </div>
                    <div class="panel-body">
                        {{-- Product Edit Form Start --}}
                        <form action="{{ url()->current() }}" method="post" class="form-horizontal col-lg-12" id="form">
                            {!! csrf_field() !!}
                            {!! method_field("patch") !!}
                            <div class="form-group">
                                <label for="" class="col-lg-2">
                                    页面内容
                                </label>
                                <div class="col-lg-10">
                                    <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
                                </div>
                                <div class="row">
                                    <div class="col-lg-10 col-lg-offset-2">
                                        <div id="dropzone-holder">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-10 col-lg-offset-2">
                                    <button type="submit" class="btn btn-success col-sm-12">更新</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-lg-10 col-lg-offset-2">
                            <form id="dropzone-form" action="{{ url('products/upload') }}" method="POST" class="dropzone" style="margin-top: 100px;">
                                {!! csrf_field() !!}
                            </form>
                        </div>
                        {{-- Product Edit Form End --}}
                    </div>
                </div>
            </div>
            <div class="col-md-3">
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
                ue.execCommand('insertHtml', '{!! addslashes($about->body) !!}');
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