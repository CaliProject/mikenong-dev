@extends('manage.app')

@section('title', '新增产品')

@push('scripts.header')
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
        var ue = UE.getEditor('editor');
    </script>
@endsection