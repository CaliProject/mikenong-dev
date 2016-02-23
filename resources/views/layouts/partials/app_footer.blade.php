<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <p>客服QQ: <a href="tencent://AddContact/?fromId=45&fromSubId=1&subcmd=all&uin={{ \App\SiteConfiguration::getSiteServiceQQ() }}">{{ \App\SiteConfiguration::getSiteServiceQQ() }}</a></p>
            </div>
        </div>
        <div class="row">
            <div class="friend-links text-center">
                <p>友情链接:
                {{--<ul class="list-group">--}}
                    @for($i = 1; $i <= 20; $i++)
                        @unless(\App\SiteConfiguration::getFriendLink($i) == "")
                            {!! \App\SiteConfiguration::getFriendLink($i) !!}
                        @endunless
                    @endfor
                {{--</ul>--}}
                </p>
            </div>
        </div>
        <div class="row"><div class="col-md-8 col-md-offset-2"><div class="footer-separator"></div></div></div>
        <div class="row">
            <div class="copyright">
                <p>&copy; {{ date("Y") }} - {{ \App\SiteConfiguration::getSiteName() }}  版权所有 ICP证: {{ \App\SiteConfiguration::getSiteBeian() }}</p>
            </div>
        </div>
    </div>
</footer>
<div class="utilities">
    <div class="qrcode-icon">
        <i class="fa fa-qrcode"></i>
    </div>
    <div class="qrcode">
        {!! \App\SiteConfiguration::getQRImage(1) !!}
    </div>
</div>