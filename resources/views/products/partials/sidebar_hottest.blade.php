<div class="panel panel-success">
    <div class="panel-heading">合作社信息</div>
    <div class="panel-body">
        <ul class="hot-products">
            @forelse($hottest_products as $product)
                <li><a href="{{ $product->link() }}">{{ $product->title }}</a></li>
            @empty
                <li>暂无产品</li>
            @endforelse
        </ul>
    </div>
</div>