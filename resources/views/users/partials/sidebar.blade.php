<div class="panel panel-success details-panel">
    <div class="panel-heading">基本信息</div>
    <div class="panel-body">
        @unless($user->role == "cooperative")
            <div class="author">{{ $user->real_name }}</div>
            <div class="info">手机:{{ $user->cellphone }}</div>
        @else
                <div class="author">{{ $user->coop_name }}</div>
                <div class="info">联系电话:{{ $user->coop_phone }}</div>
        @endunless
        <div class="info">{{ $user->description }}</div>
    </div>
</div>