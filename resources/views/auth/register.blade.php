@extends('layouts.app')

@section('title', '注册用户')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-success">
                <div class="panel-heading">注册</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">注册类型</label>

                            <div class="col-md-6">
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="role" id="role-input" value="individual"{{ old('role') == "individual" ? " checked" : (old('role') ? "" : " checked") }} onclick="changeRole($(this))">
                                        个人用户
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="role" id="role-input" value="cooperative"{{ old('role') == "cooperative" ? " checked" : "" }} onclick="changeRole($(this))">
                                        合作社用户
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">*用户名</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">*邮箱</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">*密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">*确认密码</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">真实姓名</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="real_name" value="{{ old('real_name') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">性别</label>
                            <div class="col-md-6">
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="gender" id="role-individual" value="male"{{ old('gender') == "male" ? " checked" : (old('gender') ? "" : " checked") }}>
                                        男
                                    </label>
                                </div>
                                <div class="radio-inline">
                                    <label>
                                        <input type="radio" name="gender" id="role-individual" value="female"{{ old('gender') == "female" ? " checked" : "" }}>
                                        女
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">联系电话</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="cellphone" value="{{ old('cellphone') }}" maxlength="11">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">QQ</label>

                            <div class="col-md-6">
                                <input type="number" class="form-control" name="qq" value="{{ old('qq') }}">
                            </div>
                        </div>

                        <div id="cooperative-related-inputs" style="display: none;">
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">合作社名字</label>

                                <div class="col-md-6">
                                    <input type="text" name="coop_name" class="form-control" value="{{ old('coop_name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">淘宝链接</label>

                                <div class="col-md-6">
                                    <input type="text" name="taobao" class="form-control" value="{{ old('taobao') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="col-md-4 control-label">合作社电话</label>

                                <div class="col-md-6">
                                    <input type="number" name="coop_phone" class="form-control" value="{{ old('coop_phone') }}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>注册
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer-script')
    <script>
        function changeRole(input) {
            if (input.attr('value') == "cooperative") {
                // Cooperative selected
                $('#cooperative-related-inputs').fadeIn(500);
            } else {
                // Individual selected
                $('#cooperative-related-inputs').fadeOut(500);
            }
        }
    </script>
@stop