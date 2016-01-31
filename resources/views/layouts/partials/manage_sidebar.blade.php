<section id="manage-sidebar">
    <ul class="sidebar">
        <li{{ url()->current() == url('/manage') ? ' class=active' : '' }}><a href="{{ url('/manage') }}">首页</a></li>
        <li{{ url()->current() == url('/manage/products') ? ' class=active' : '' }}><a href="{{ url('/manage/products') }}">产品管理</a></li>
        <li{{ url()->current() == url('/manage/categories') ? ' class=active' : '' }}><a href="{{ url('/manage/categories') }}">分类管理</a></li>
        <li{{ url()->current() == url('/manage/users') ? ' class=active' : '' }}><a href="{{ url('/manage/users') }}">用户管理</a></li>
    </ul>
</section>