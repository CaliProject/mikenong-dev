@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8">
                {{-- Banner Start --}}
                <div class="banner">
                    <ul class="banner-list">
                        <li class="active"><a href=""><img src="/images/banner1.jpg" alt=""></a></li>
                        <li><a href=""><img src="/images/banner2.jpg" alt=""></a></li>
                        <li><a href=""><img src="/images/banner3.jpg" alt=""></a></li>
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
                        <ul>
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
                            <li><p>信息</p></li>
                        </ul>
                    </div>
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
                    <div class="panel-body">Test</div>
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