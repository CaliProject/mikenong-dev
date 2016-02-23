<div class="panel panel-success">
    <div class="panel-heading">优秀合作社</div>
    <div class="panel-body">
        <ul class="home-cooperation">
            @forelse($latest as $product)
                <li><span class="time">{{ $product->updated_at->diffForHumans() }}</span><a href="{{ action('ProductsController@productDetails', ["id" => $product->id]) }}">{{ $product->pricing }}</a></li>
            @empty
                <li>暂无产品</li>
            @endforelse
        </ul>
    </div>
</div>