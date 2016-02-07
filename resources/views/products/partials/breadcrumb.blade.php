<ol class="details-breadcrumb">
    <li><a href="{{ url('/') }}">{{ \App\SiteConfiguration::getSiteName() }}</a></li>
    @if($product->category->hasParent())
        <li><a href="{{ $product->category->parent->link() }}">{{ $product->category->parent->name }}</a></li>
    @endif
    <li><a href="{{ $product->category->link() }}">{{ $product->category->name }}</a></li>
</ol>