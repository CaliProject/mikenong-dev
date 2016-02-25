@unless(\App\SiteConfiguration::getValueByKey('sidebar.text') === "")
    <div class="panel panel-success">
        <div class="panel-heading">
            <i class="fa fa-rss"></i>&nbsp;公告
        </div>
        <div class="panel-body">
            {!! \App\SiteConfiguration::getValueByKey('sidebar.text') !!}
        </div>
    </div>
@endunless