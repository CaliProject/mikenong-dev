@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">
                    创建新产品
                </div>
                <div class="panel-body">
                    <form action="{{ url('/products/create') }}" method="POST" class="form-horizontal">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                产品标题
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                联系人
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                联系电话
                            </label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                手机号码
                            </label>
                            <div class="col-lg-10">
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                联系地址
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                联系邮箱
                            </label>
                            <div class="col-lg-10">
                                <input type="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                联系QQ
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                上市时间
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 control-label">
                                最新报价
                            </label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-lg-2 control-label">
                                产品介绍
                            </label>
                            <div class="col-lg-10">
                                <div id="toolbar"></div>
                                <div id="content-editor" class="clear">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur culpa dicta labore libero nihil nobis, perspiciatis quasi quia voluptate. Asperiores culpa doloremque dolores exercitationem, fugiat nihil optio porro ratione sit.
                                </div>
                            </div>
                        </div>
                    </form>
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