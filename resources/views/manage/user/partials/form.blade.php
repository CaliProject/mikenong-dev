<form action="{{ $action_url }}" method="{{ $method }}" class="form-horizontal col-lg-10 col-lg-offset-1" id="form">
    {!! csrf_field() !!}
    @if(Auth::user()->isManager())
        <div class="form-group">
            <label for="" class="col-lg-2">
                *用户名
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" required>
            </div>
        </div>
    @endif
    <div class="form-group">
        <label for="" class="col-lg-2">
            *电子邮箱
        </label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *真实姓名
        </label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="real_name" value="{{ old('real_name') ? old('real_name') : $user->real_name }}" required>
        </div>
    </div>
    @if(Auth::user()->isManager() && $user->role == "cooperative")
    <div class="form-group">
        <label for="" class="col-lg-2">
            *用户类型
        </label>
        <div class="col-lg-8">
            <div class="radio-inline">
                <input type="radio" name="role" value="individual"{{ $user->role == "individual" ? " checked" : "" }}>个人
            </div>
            <div class="radio-inline">
                <input type="radio" name="role" value="cooperative"{{ $user->role == "cooperative" ? " checked" : "" }}>合作社
            </div>
            <div class="radio-inline">
                <input type="radio" name="role" value="administrator"{{ $user->role == "administrator" ? " checked" : "" }}>管理员
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">优秀合作社</label>
        <div class="col-lg-8">
            <div class="radio-inline"><input type="radio" name="is_essential" value="on"{{ $user->is_essential ? " checked" : "" }}>优秀</div>
            <div class="radio-inline"><input type="radio" name="is_essential" value="off"{{ !$user->is_essential ? " checked" : "" }}>否</div>
        </div>
    </div>
    @endif
    <div class="form-group">
        <label for="" class="col-lg-2">
            *性别
        </label>
        <div class="col-lg-8">
            <div class="radio-inline">
                <input type="radio" name="gender" value="male"{{ $user->gender == "male" ? " checked" : "" }}>男
            </div>
            <div class="radio-inline">
                <input type="radio" name="gender" value="female"{{ $user->gender == "female" ? " checked" : "" }}>女
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            QQ
        </label>
        <div class="col-lg-8">
            <input type="number" class="form-control" name="qq" value="{{ old('qq') ? old('qq') : $user->qq }}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            地址
        </label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $user->address }}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            介绍
        </label>
        <div class="col-lg-8">
            <textarea class="form-control" name="description" id="">{!! $user->description !!}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            手机号码
        </label>
        <div class="col-lg-8">
            <input type="number" class="form-control" name="cellphone" value="{{ old('cellphone') ? old('cellphone') : $user->cellphone }}">
        </div>
    </div>
    @if(Auth::user()->role == 'cooperative' || Auth::user()->isManager())
        <div class="form-group">
            <label for="" class="col-lg-4 separator" style="color: #9b9b9b;">
                以下为合作社用户专属
            </label>
        </div>
        <div class="form-group">
            <label for="" class="col-lg-2">
                合作社名
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="coop_name" value="{{ old('coop_name') ? old('coop_name') : $user->coop_name }}">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-lg-2">
                淘宝店铺
            </label>
            <div class="col-lg-8">
                <input type="text" class="form-control" name="taobao" value="{{ old('taobao') ? old('taobao') : $user->taobao }}">
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-lg-2">
                合作社电话
            </label>
            <div class="col-lg-8">
                <input type="number" class="form-control" name="coop_phone" value="{{ old('coop_phone') ? old('coop_phone') : $user->coop_phone }}">
            </div>
        </div>
    @endif
    <div class="form-group">
        <label for="" class="col-lg-4 separator" style="color: #9b9b9b;">
            更改密码
        </label>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            新密码
        </label>
        <div class="col-lg-8">
            <input type="password" name="password" class="form-control" placeholder="不修改则留空">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            确认新密码
        </label>
        <div class="col-lg-8">
            <input type="password" name="confirm_password" class="form-control" placeholder="不修改则留空">
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-2 col-lg-offset-2">
            <button type="submit" class="btn btn-success">{{ $action_button }}</button>
        </div>
    </div>
</form>