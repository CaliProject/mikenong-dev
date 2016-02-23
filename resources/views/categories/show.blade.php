@extends('layouts.app')

@section('title', $category ? $category->name . '的产品' : "全部分类")

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        分类列表
                        <div class="right" style="float: right;">
                            为您找到{{ $products->total() }}个产品
                        </div>
                    </div>
                    <div class="panel-body">
                        <ul class="category-list">
                            @if(is_null($category))
                                <li class="active"><a href="{{ url('categories') }}">全部分类</a></li>
                                @foreach(\App\Category::superCategories()->get() as $c)
                                    <li><a href="{{ $c->link() }}">{{ $c->name }}</a></li>
                                @endforeach
                            @else
                                <li><a href="{{ url('categories') }}">全部分类</a></li>
                                @if($category->hasSubcategories())
                                    <li class="active"><a href="{{ action('HomeController@showCategory', ["id" => $category->id]) }}">{{ $category->name }}</a></li>
                                    @foreach($category->getSubCategories() as $subCategory)
                                        <li><a href="{{ $subCategory->link() }}">{{ $subCategory->name }}</a></li>
                                    @endforeach
                                @else
                                    <li><a href="{{ action('HomeController@showCategory', ["id" => $category->parent->id]) }}">{{ $category->parent->name }}</a></li>
                                    @foreach($category->parent->getSubCategories() as $subCategory)
                                        <li{{ $subCategory->id == $category->id ? " class=active" : '' }}><a href="{{ $subCategory->link() }}">{{ $subCategory->name }}</a></li>
                                    @endforeach
                                @endif
                            @endif
                        </ul>
                        <ul class="status-list">
                            @if(is_null($category))
                            @else
                                <li{{ $status == 'all' ? ' class=active' : '' }}><a href="{{ $category->link() }}">全部</a></li>
                                <li{{ $status == 'provide' ? ' class=active' : '' }}><a href="{{ $category->provideLink() }}">供应</a></li>
                                <li{{ $status == 'demand' ? ' class=active' : '' }}><a href="{{ $category->demandLink() }}">求购</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        {{ is_null($category) ? "全部分类产品列表" : $category->name . "的产品列表" }}
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