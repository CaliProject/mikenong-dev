@extends('manage.app')

@section('title', '编辑用户')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>编辑用户</h2>
        <div class="manage-actions">
            @include('manage.user.partials.form', [
             'method' => 'POST',
             'action_url' => action('ManageController@updateUser', ['id' => $user->id]),
             'action_button' => '更新'])
        </div>
    </div>
@stop