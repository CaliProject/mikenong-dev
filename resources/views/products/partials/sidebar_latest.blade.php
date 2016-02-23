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
        @if(count($latest_cooperatives) == 8)
            <div class="navbar-right" style="margin-right: 8px">
                <a href="{{ url('cooperatives') }}">查看全部 <i class="fa fa-angle-double-right"></i></a>
            </div>
        @endif
    </div>
</div>