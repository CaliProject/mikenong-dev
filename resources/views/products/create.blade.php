@extends('layouts.app')

@section('title', '创建产品')

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
        <div class="col-md-8 col-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    创建新产品
                </div>
                <div class="panel-body">
                    {{-- Product Create Form Start --}}
                    @include('manage.product.partials.form', [
                        'method' => 'POST',
                        'action_url' => url('/product/create'),
                        'action_button' => '创建',
                        'product' => new \App\Product
                    ])
                    {{-- Product Create Form End --}}
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('footer-script')
    <script>
        ;(function(window) {
            'use strict';

            var ue = UE.getEditor('editor');

            setTimeout(function () {
                ue.execCommand('insertHtml', '<img src="https://ss0.bdstatic.com/5aV1bjqh_Q23odCf/static/superman/img/logo/logo_white.png" />');
            }, 500);

            Dropzone.options.dropzoneForm = {
                paramName: "photo",
                maxFilesize: 2, // MB
                accept: function(file, done) {
                    done();
                }
            };
        })(window);
    </script>
@stop