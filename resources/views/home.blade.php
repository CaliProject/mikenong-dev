@extends('layouts.app')

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
                    </ul>
                    <div class="banner-dots">
                        <div class="banner-nav">
                            <a class="trigger current" href="javascript:;"></a>
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
                        <ul class="home-list">
                            <li><p><span>[供]</span>信息信息信息信息<span class="time">2016-01-31</span></p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                            <li><p>信息</p></li>
                        </ul>
                    </div>
					<nav class="home-pagination">
					  <ul class="pagination">
					    <li>
					      <a href="#" aria-label="Previous">
					        <span aria-hidden="true">&laquo;</span>
					      </a>
					    </li>
					    <li><a href="#">1</a></li>
					    <li><a href="#">2</a></li>
					    <li><a href="#">3</a></li>
					    <li><a href="#">4</a></li>
					    <li><a href="#">5</a></li>
					    <li>
					      <a href="#" aria-label="Next">
					        <span aria-hidden="true">&raquo;</span>
					      </a>
					    </li>
					  </ul>
					</nav>
                </div>

            </div>
            <div class="col-md-4">
                <div class="create-panel panel panel-success">
                    <div class="panel-body text-center">
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