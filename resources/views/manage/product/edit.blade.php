@extends('manage.app')

@section('title', '编辑产品')

@push('scripts.header')
<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="{{ url('ueditor') }}/lang/zh-cn/zh-cn.js"></script>
@endpush

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>编辑产品</h2>
        <div class="manage-actions">
            @include('manage.product.partials.form', [
             'method' => 'POST',
             'action_url' => action('ManageController@updateProduct', ["id" => $product->id]),
             'action_button' => '更新'])
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

        })(window);
    </script>
@endsection