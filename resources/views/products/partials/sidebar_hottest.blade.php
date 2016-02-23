<div class="panel panel-success">
    <div class="panel-heading">合作社信息</div>
    <div class="panel-body">
        <ul class="hot-products">
            @forelse($hottest_cooperatives as $cooperative)
                <li><a href="{{ $cooperative->link() }}">{{ $cooperative->coop_name }}</a></li>
            @empty
                <li>暂无合作社</li>
            @endforelse
        </ul>
    </div>
</div>