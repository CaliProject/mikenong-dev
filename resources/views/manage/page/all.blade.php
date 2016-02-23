@extends('manage.app')

@section('title', '公告管理')

@section('content')
    <div class="manage-container">
        <h2>公告管理</h2>
        <div class="manage-actions">
            <a href="{{ url('/manage/pages/add') }}" class="btn btn-default"><i class="fa fa-plus"></i> 新增公告</a>
        </div>
        <div class="manage-lists">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>公告标题</td>
                    <td>发布时间</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                @forelse($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->created_at->format('Y年m月d日') }}</td>
                        <td>
                            <a href="{{ action('ManageController@editPage', ['id' => $page->id]) }}" class="btn btn-success btn-sm">编辑</a>
                            <a data-id="{{ $page->id }}" href="javascript:;" onclick="deleteProduct($(this))" class="btn btn-danger btn-sm">删除</a>
                        </td>
                    </tr>
                @empty
                    <tr class="active">
                        <td>无</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('footer-script')
    <script>
        function deleteProduct(el) {
            if (confirm("确定要删除该公告吗?")) {
                $.ajax({
                    url: "{{ url('/manage/pages/') }}/" + el.attr('data-id'),
                    type: "DELETE",
                    data: {_token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function(json) {
                        if (json.status == "success") {
                            window.location.href = "{{ url()->current() }}";
                        } else {
                            alert('删除公告失败,请重试');
                        }
                    }
                });
            }
        }
    </script>
@stop