<div class="banner">
    <ul class="banner-list">
        @for($i = 1; $i <= 4; $i++)
            <li{{$i == 1 ? ' class=active' : ''}}>{!! \App\SiteConfiguration::getBannerImage($i) !!}</li>
        @endfor
    </ul>
    <div class="banner-dots">
        <div class="banner-nav">
            <a class="trigger current" href="javascript:;"></a>
            <a class="trigger" href="javascript:;"></a>
            <a class="trigger" href="javascript:;"></a>
            <a class="trigger" href="javascript:;"></a>
        </div>
    </div>
</div>