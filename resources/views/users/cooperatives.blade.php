@extends('layouts.app')

@section('title', '合作社')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-success">
                    <div class="panel-heading">合作社</div>
                    <div class="panel-body">
                        <ul class="home-list">
                            @forelse($cooperatives as $cooperative)
                                <li{{ $cooperative->is_essential ? " class=user-sticky" : "" }} style="margin-bottom: 18px"><p><a href="{{ $cooperative->link() }}">{{ $cooperative->coop_name }}</a><span class="time">共发布{{ $cooperative->productsCount() }}个产品</span></p></li>
                            @empty
                                <li>
                                    <p>暂无合作社</p>
                                </li>
                            @endforelse
                        </ul>
                        <nav class="home-pagination">
                            {!! $cooperatives->links() !!}
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_hottest')
                @include('products.partials.sidebar_images')
            </div>
        </div>
    </div>
@stop