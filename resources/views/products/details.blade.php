@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
					<ol class="details-breadcrumb">
						<li><a href="#">农产品信息网</a></li>
						<li><a href="#">瓜果交易网</a></li>
						<li>脐橙</li>
					</ol>
                </div>
                <div class="panel-body">
					<div class="details-body">
						<div class="details-header">
							<h2>[供] 大量批发脐橙，产地直供</h2>
							<div class="meta">
								<ul>
								<li>时间：2016-1-31 9:59</li>
								<li>浏览人数：2052</li>
								</ul>
							</div>
						</div>
						<div class="details-content">
							<ul class="info">
								<li><span>发布单位</span>余先生【个体】</li>
								<li><span>手机号码</span>15871565682</li>
							</ul>
							<div class="relate">相关链接：<a href="">脐橙价格</a></div>
						</div>
					</div>
                </div>
            </div>
			<div class="panel panel-default related-panel">
				<div class="panel-heading">该会员还了发布以下信息</div>
				<div class="panel-body">
					<ul>
						<li>宜昌早熟蜜桔大量供应 <span class="time">(2016-1-6 8:44:00)</span></li>
						<li>宜昌早熟蜜桔大量供应 <span class="time">(2016-1-6 8:44:00)</span></li>
						<li>宜昌早熟蜜桔大量供应 <span class="time">(2016-1-6 8:44:00)</span></li>
					</ul>
				</div>
			</div>
        </div>
		<div class="col-md-4">
			<div class="panel panel-success details-panel">
				<div class="panel-heading">信息发布人</div>
				<div class="panel-body">
					<div class="author">张先生</div>
					<div class="info">本人长期做水果代办，有丰富的看货，选果经验。现我地特早蜜桔已上市，果型好，价格底，无公害，交通便利，提供打蜡，包装，上车等服务，免费食宿，欢迎各地客商前来选购。</div>
					<div class="more"><a href="">详细信息</a></div>
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
		</div>
    </div>
</div>
@stop

@section('footer-script')
    <script>
        $(document).ready(function() {
            $('#content-editor').freshereditor({toolbar_selector: "#toolbar", excludes: ['removeFormat', 'insertheading4']});
            $("#content-editor").freshereditor("edit", true);
        });
    </script>
@stop