<ul class="home-list">
    @forelse($products as $product)
        <li class="{{ $product->is_sticky ? 'sticky' : '' }}{{ $product->is_essential ? ' essential' : '' }}">
            <p>
                <span>[{{ $product->readableStatus() }}]</span>
                <a href="{{ $product->link() }}">{{ $product->title }}</a>
                <span class="time">{{ $product->created_at->diffForHumans() }}</span>
            </p>
        </li>
    @empty
        <li><p>暂无产品</p></li>
    @endforelse
</ul>