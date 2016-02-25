@extends('layouts.app')

@section('title', '我的资料')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                @include('manage.flash-message')
                <div class="panel panel-success">
                    <div class="panel-heading">
                        编辑资料
                    </div>
                    <div class="panel-body">
                        @include('manage.user.partials.form', [
                                 'method' => 'POST',
                                 'action_url' => action('ProfileController@updateProfile'),
                                 'action_button' => '更新资料',
                                 'user' => Auth::user()])
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