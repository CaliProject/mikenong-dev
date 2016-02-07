<div class="panel panel-success details-panel">
    <div class="panel-heading">信息发布人</div>
    <div class="panel-body">
        <div class="author">{{ $user->real_name }}</div>
        <div class="info">{{ $user->description }}</div>
        <div class="more"><a href="{{ $user->link() }}">详细信息</a></div>
    </div>
</div>