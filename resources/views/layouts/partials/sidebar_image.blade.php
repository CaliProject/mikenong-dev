@unless(\App\SiteConfiguration::getValueByKey('sidebar.image') === "")
<div class="panel panel-success sidebar-image">
    <div class="panel-body">
        {!! \App\SiteConfiguration::getSidebarCustomImage() !!}
    </div>
</div>
@endunless