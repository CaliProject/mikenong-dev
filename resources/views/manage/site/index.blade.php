@extends('manage.app')

@section('title', '站点设置')

@push('styles')
<link rel="stylesheet" href="{{ url('css/dropzone.css') }}">
@endpush

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>站点设置</h2>
        <div class="manage-actions row">
            <form action="{{ url('/manage/site') }}" method="POST" class="col-lg-8 form-horizontal" id="form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        站点名称
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="name" value="{{ \App\SiteConfiguration::getSiteName() }}" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        站点介绍
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="description" value="{{ \App\SiteConfiguration::getSiteDescription() }}" placeholder="简洁的话语描述站点">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        站点关键字
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="keywords" value="{{ \App\SiteConfiguration::getSiteKeywords() }}" placeholder="用','分割关键字,如'a,b,c,d'">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        备案号
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="beian" value="{{ \App\SiteConfiguration::getSiteBeian() }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        客服QQ号
                    </label>
                    <div class="col-lg-8">
                        <input type="number" class="form-control" name="qq" value="{{ \App\SiteConfiguration::getSiteServiceQQ() }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        友情链接
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="qq" value="{{ \App\SiteConfiguration::getSiteServiceQQ() }}">
                    </div>
                </div>
                @for($i = 1; $i <= 3; $i++)
                    <div class="form-group">
                        <label for="" class="col-lg-2">
                            边栏图片{{ $i }}
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="sidebar{{$i}}" value="{{ \App\SiteConfiguration::getValueByKey('sidebar.images.'.$i) }}" placeholder="图片地址|图片跳转链接, 比如'http://example.com/e.png|http://baidu.com'">
                        </div>
                    </div>
                @endfor
                <div class="form-group">
                    <label for="" class="col-lg-2">二维码</label>
                    <div class="col-lg-8"><input type="text" class="form-control" name="qrcode" value="{{ \App\SiteConfiguration::getValueByKey('qrcodes.1') }}" placeholder="图片地址"></div>
                </div>
                @for($i = 1; $i <= 8; $i++)
                    <div class="form-group">
                        <label for="" class="col-lg-2">
                            导航菜单{{ $i }}
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="link{{$i}}" value="{{ \App\SiteConfiguration::getValueByKey('nav.link.'.$i) }}" placeholder="用'|'分割,比如'百度|http://baidu.com'">
                        </div>
                    </div>
                @endfor
                @for($i = 1; $i <= 20; $i++)
                    <div class="form-group">
                        <label for="" class="col-lg-2">
                            友情链接{{ $i }}
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="footer-link{{$i}}" value="{{ \App\SiteConfiguration::getValueByKey('footer.link.'.$i) }}" placeholder="用'|'分割,比如'百度|http://baidu.com'">
                        </div>
                    </div>
                @endfor
                @for($i = 1; $i <= 4; $i++)
                    <div class="form-group">
                        <label for="" class="col-lg-2">幻灯图{{$i}}</label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="banner{{$i}}" value="{{ \App\SiteConfiguration::getValueByKey('banner.image.' . $i) }}" placeholder="图片地址|图片跳转链接">
                        </div>
                    </div>
                @endfor
                <div class="form-group">
                    <div class="col-lg-2 col-lg-offset-2">
                        <button type="submit" class="btn btn-success">更新</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-6 col-lg-offset-2 row" style="margin-bottom: 15px">
            <div class="form-group" style="width: 100%; position:relative;">
                <input type="text" class="form-control col-lg-8" placeholder="图片地址将生成在这里..." id="image-url">
            </div>
        </div>
        <div class="row">
            <form action="{{ url('products/upload') }}" method="POST" class="dropzone col-lg-8 col-lg-offset-1" id="dropzone" style="height: 200px;overflow: scroll;width: 85%;border: 2px dashed rgba(76, 174, 76, 0.35);border-radius: 8px;-webkit-border-radius: 8px;-moz-border-radius: 8px; -ms-border-radius: 8px;-o-border-radius: 8px;">
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
@stop


@section('scripts')
    <script>
        $(function () {
            Dropzone.options.dropzone = {
                init: function () {
                    this.on('success', function (file, data) {
                        if (data.status == "ok") {
                            var $url = data.url;
                            $('input#image-url').val($url);
                        }
                    });
                },
                paramName: "photo",
                maxFilesize: 3, // MB
                acceptedFiles: 'image/*',
                dictDefaultMessage: "可拖拽图片至此或点击来上传",
                dictFileTooBig: "上传失败, 图片大小不可超过@{{maxFilesize}}MB",
                dictInvalidFileType: "文件类型错误"
            };
        });
    </script>
@stop