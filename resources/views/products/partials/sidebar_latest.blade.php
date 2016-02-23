<div class="panel panel-success">
    <div class="panel-heading">优秀合作社</div>
    <div class="panel-body">
        <ul class="hot-products">
            @forelse($latest_cooperatives as $cooperative)
                <li><a href="{{ $cooperative->link() }}">{{ $cooperative->coop_name }}</a></li>
            @empty
                <li>暂无优秀合作社</li>
            @endforelse
        </ul>
    </div>
</div>