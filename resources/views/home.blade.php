@extends('layouts.app')

@section('title', '首页')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Banner Start --}}
                @include('layouts.partials.banner')
                {{-- Banner End --}}
                <div class="panel panel-success">
                    <div class="panel-heading">
                        产品信息
                    </div>
                    <div class="panel-body">
                        {{-- Product List Start --}}
                        @include('products.partials.product_list')
                        {{-- Product List End --}}
                    </div>
					{{-- Pagination Start--}}
                    <nav class="home-pagination">
                        {!! $products->links() !!}
                    </nav>
                    {{-- Pagination End --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="create-panel panel panel-success">
                    <div class="panel-body text-center">
                        @if(Auth::check())
                            <p>欢迎您, {{ Auth::user()->name }}</p>
                        @endif
                        <p style="margin: 0;"><a href="{{ url('/products/create') }}" class="btn btn-success"><i class="fa fa-edit"></i> 免费发布信息</a></p>
                    </div>
                </div>
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_hottest')
            </div>
        </div>
    </div>
@endsection

@section('footer-script')
    <script>
        $(function(){
            $(".banner").imageBanner();
        });
    </script>
@endsection