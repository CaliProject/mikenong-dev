<div class="panel panel-success details-panel">
    <div class="panel-heading">基本信息</div>
    <div class="panel-body">
        @unless($user->role == "cooperative")
            <div class="author">{{ $user->real_name }}</div>
            @if($user->cellphone != "")
            <div class="" style="margin-bottom: 8px">手机:{{ $user->cellphone }}</div>
            @endif
        @else
            <div class="author">{{ $user->coop_name }}</div>
            @if($user->coop_phone != "")
            <div class="padding" style="margin-bottom: 8px">联系电话:{{ $user->coop_phone }}</div>
            @endif
        @endunless
            <div class="" style="margin-bottom: 8px">联系邮箱:{{ $user->email }}</div>
            @unless($user->address == "")
            <div class="" style="margin-bottom: 8px">联系地址:{{ $user->address }}</div>
            @endunless
        @if($user->description != "")
            <div class="info">{{ $user->description }}</div>
        @endif
    </div>
</div>