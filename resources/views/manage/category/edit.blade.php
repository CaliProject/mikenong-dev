@extends('manage.app')

@section('title', '编辑分类')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>编辑分类</h2>
        <div class="manage-actions">
            @include('manage.category.partials.form', [
             'method' => 'POST',
             'action_url' => action('ManageController@updateCategory', ['id' => $category->id]),
             'action_button' => '更新'])
        </div>
    </div>
@stop