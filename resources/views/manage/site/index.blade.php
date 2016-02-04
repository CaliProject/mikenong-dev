@extends('manage.app')

@section('title', '站点设置')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>站点设置</h2>
        <div class="manage-actions">
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
                @for($i = 1; $i <= 5; $i++)
                    <div class="form-group">
                        <label for="" class="col-lg-2">
                            导航菜单{{ $i }}
                        </label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="link{{$i}}" value="{{ \App\SiteConfiguration::getSiteNavLink($i) }}" placeholder="用'|'分割,比如'名称|http://baidu.com'">
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
    </div>
@stop