<div class="panel panel-success">
    <div class="panel-body sidebar-images">
        @for($i = 1; $i <= 3; $i++)
            @unless(\App\SiteConfiguration::getSidebarImage($i) == "")
                {!! \App\SiteConfiguration::getSidebarImage($i) !!}
            @endunless
        @endfor
    </div>
</div>