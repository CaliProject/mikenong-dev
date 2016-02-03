@extends('manage.app')

@section('title', '新增分类')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>新增分类</h2>
        <div class="manage-actions">
            @include('manage.category.partials.form', [
             'method' => 'POST',
             'action_url' => url('/manage/categories/add'),
             'action_button' => '新建',
             'category' => new \App\Category])
        </div>
    </div>
@stop