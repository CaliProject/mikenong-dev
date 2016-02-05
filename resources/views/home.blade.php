@extends('layouts.app')

@section('title', '首页')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                {{-- Banner Start --}}
                <div class="banner">
                    <ul class="banner-list">
                        <li class="active"><a href=""><img src="images/banner1.jpg" alt=""></a></li>
                        <li><a href=""><img src="images/banner2.jpg" alt=""></a></li>
                        <li><a href=""><img src="images/banner3.jpg" alt=""></a></li>
                        <li><a href=""><img src="images/banner4.jpg" alt=""></a></li>
                    </ul>
                    <div class="banner-dots">
                        <div class="banner-nav">
                            <a class="trigger current" href="javascript:;"></a>
                            <a class="trigger" href="javascript:;"></a>
                            <a class="trigger" href="javascript:;"></a>
                            <a class="trigger" href="javascript:;"></a>
                        </div>
                    </div>
                </div>
                {{-- Banner End --}}
                <div class="panel panel-success">
                    <div class="panel-heading">
                        产品信息
                    </div>
                    <div class="panel-body">
                        {{-- Product List Start --}}
                        <ul class="home-list">
                            @forelse($latest_products as $product)
                                <li class="{{ $product->is_sticky ? 'sticky' : '' }}{{ $product->is_essential ? ' essential' : '' }}">
                                    <p>
                                        <span>[{{ $product->readableStatus() }}]</span>
                                        <a href="">{{ $product->title }}</a>
                                        <span class="time">{{ $product->created_at->format('Y-m-d') }}</span>
                                    </p>
                                </li>
                            @empty
                                <li><p>暂无产品</p></li>
                            @endforelse
                        </ul>
                        {{-- Product List End --}}
                    </div>
					{{-- Pagination Start--}}
                    <nav class="home-pagination">
                        {!! $latest_products->links() !!}
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
                <div class="panel panel-success">
                    <div class="panel-heading">Sidebar</div>
                    <div class="panel-body">
						<ul class="home-cooperation">
							<li><span class="time">1 小时前</span><a href="">红富士苹果膜袋/纸袋红富士苹果：0.6-1.2元/斤</a></li>
							<li><span class="time">1 小时前</span><a href="">红富士苹果膜袋/纸袋红富士苹果：0.6-1.2元/斤</a></li>
							<li><span class="time">1 小时前</span><a href="">红富士苹果膜袋/纸袋红富士苹果：0.6-1.2元/斤</a></li>
						</ul>
                    </div>
                </div>
                <div class="panel panel-success">
                    <div class="panel-heading">Sidebar</div>
                    <div class="panel-body">Test</div>
                </div>

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