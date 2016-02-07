@extends('layouts.app')

@section('title', '"' . $keyword . '"的相关产品')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        "{{ $keyword }}"的相关产品
                        <div style="float: right;">
                            为您一共{{ $products->total() }}个相关产品
                        </div>
                    </div>
                    <div class="panel-body">
                        @include('products.partials.product_list')
                    </div>
                    <nav class="home-pagination">
                        {!! $products->links() !!}
                    </nav>
                </div>
            </div>
            <div class="col-md-4">
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_hottest')
            </div>
        </div>
    </div>
@stop