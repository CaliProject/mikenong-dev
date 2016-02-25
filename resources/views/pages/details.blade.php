@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">

                    </div>
                    <div class="panel-body">
                        <div class="details-body">
                            <div class="details-header">
                                <h2>{{ $page->title }}</h2>
                                <div class="meta">
                                    <ul>
                                        <li>时间：{{ $page->created_at->format("Y年m月d日 H:i") }}</li>
                                        @unless(Auth::guest())
                                            @if(Auth::user()->isManager())
                                                <li class="navbar-right">
                                                    <a href="{{ action('ManageController@editPage', ["id" => $page->id]) }}">编辑</a>
                                                </li>
                                            @endif
                                        @endunless
                                    </ul>
                                </div>
                            </div>
                            <div class="details-content">
                                <ul class="info">
                                    <li><span>公告详情</span></li>
                                </ul>
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div id="product-description">
                                        {!! $page->content !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.sidebar_news')
                @include('layouts.partials.sidebar_image')
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_hottest')
                @include('products.partials.sidebar_images')
            </div>
        </div>
    </div>
@stop