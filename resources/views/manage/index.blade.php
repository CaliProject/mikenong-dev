@extends('manage.app')

@section('title', '管理首页')

@section('content')
    <div class="manage-container">
        <h2>管理首页</h2>
        <div class="col-lg-8">
            <div class="manage-index">
                <div class="col-lg-5">
                    <h5>产品总数</h5>
                    <p>{{ $productsCount }}</p>
                </div>
                <div class="col-lg-5">
                    <h5>分类总数</h5>
                    <p>{{ $categoriesCount }}</p>
                </div>
                <div class="col-lg-5">
                    <h5>用户总数</h5>
                    <p>{{ $usersCount }}</p>
                </div>
            </div>
        </div>
    </div>
@stop