@extends('layouts.app')

@section('title', $product->title)

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    @include('products.partials.breadcrumb')
                </div>
                <div class="panel-body">
					<div class="details-body">
						<div class="details-header">
							<h2>[{{ $product->readableStatus() }}] {{ $product->title }}</h2>
							<div class="meta">
								<ul>
								    <li>时间：{{ $product->created_at->format("Y年m月d日 H:i") }}</li>
								    <li>浏览次数：{{ isset($product->views) ? $product->views->views : '1' }}</li>
                                    @if(Auth::user()->isManager())
                                        <li class="navbar-right">
                                            <a href="{{ action('ManageController@editProduct', ["id" => $product->id]) }}">编辑</a>
                                        </li>
                                    @elseif(Auth::user()->id == $product->user->id)
                                        <li class="navbar-right">
                                            <a href="{{ action('ManageController@editProduct', ["id" => $product->id]) }}">编辑</a>
                                        </li>
                                    @endif
								</ul>
							</div>
						</div>
						<div class="details-content">
							<ul class="info">
                                <li><span>发布单位</span>{{ $product->user->real_name }}【{{ $product->user->getRole() }}】</li>
                                @unless($product->contact_name == "")
                                    <li><span>联系人</span>{{ $product->contact_name }}</li>
                                @endunless
								@unless($product->cellphone == "")
                                    <li><span>手机号码</span>{{ $product->cellphone }}</li>
                                @endunless
                                @unless($product->phone == "")
                                    <li><span>联系电话</span>{{ $product->phone }}</li>
                                @endunless
                                @unless($product->email == "")
                                    <li><span>联系邮箱</span>{{ $product->email }}</li>
                                @endunless
                                @unless($product->user->qq == "")
                                    <li><span>QQ</span> {{ $product->user->qq }}</li>
                                @endunless
                                @unless($product->release_date == "")
                                    <li><span>上市时间</span>{{ $product->release_date }}</li>
                                @endunless
                                @unless($product->address == "")
                                    <li><span>联系地址</span>{{ $product->address }}</li>
                                @endunless
                                @unless($product->cellphone == "")
                                    <li><span>手机号码</span>{{ $product->cellphone }}</li>
                                @endunless
                                <li><span>产品类别</span>{{ $product->category->name }}</li>
                                @unless($product->pricing == "")
                                    <li><span>最新报价</span>{{ $product->pricing }}</li>
                                @endunless
                                <li><span>产品详情</span></li>
							</ul>
                            <div class="col-lg-10 col-lg-offset-1">
                                <div id="product-description">
                                    {!! $product->description !!}
                                </div>
                            </div>
						</div>
					</div>
                </div>
            </div>
			<div class="panel panel-default related-panel">
				<div class="panel-heading">该会员还了发布以下信息</div>
				<div class="panel-body">
					<ul>
						@forelse($product->user->otherProducts($product->id) as $otherProduct)
                            <li><a href="{{ $otherProduct->link() }}">{{ $otherProduct->title }}</a> <span class="time">({{ $otherProduct->created_at->diffForHumans() }})</span></li>
                        @empty
                            <li>暂无其他产品</li>
                        @endforelse
					</ul>
				</div>
			</div>
        </div>
		<div class="col-md-4">
			@include('products.partials.sidebar_author', ["user" => $product->user])
			@include('products.partials.sidebar_latest')
            @include('products.partials.sidebar_hottest')
		</div>
    </div>
</div>
@stop

@section('footer-script')
    <script>
        $(function () {

		});
    </script>
@stop