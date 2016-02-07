@extends('layouts.app')

@section('title', $category->name . '的产品')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        全部分类
                        <div class="right" style="float: right;">
                            为您找到{{ $products->total() }}个产品
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="category-list">
                            @foreach(\App\Category::all() as $c)
                                <li{{ $category->id == $c->id ? ' class=active' : '' }}><a href="{{ $c->link() }}">{{ $c->name }}</a></li>
                            @endforeach
                        </ul>
                        <ul class="status-list">
                            <li{{ $status == 'all' ? ' class=active' : '' }}><a href="{{ $category->link() }}">全部</a></li>
                            <li{{ $status == 'provide' ? ' class=active' : '' }}><a href="{{ $category->provideLink() }}">供应</a></li>
                            <li{{ $status == 'demand' ? ' class=active' : '' }}><a href="{{ $category->demandLink() }}">求购</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        {{ $category->name }}的产品列表
                    </div>
                    <div class="panel-body">
                        @include('categories.partials.product_list')
                    </div>
                    <nav class="home-pagination">
                        {!! $products->links() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop