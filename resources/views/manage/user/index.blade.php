@extends('manage.app')

@if(isset($keyword))
    @section('title', $keyword . '的相关用户')
@else
    @section('title', '用户管理')
@endif

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>
            @if(isset($keyword))
                {{ '"' . $keyword . '"的相关用户' }}
            @else
                用户管理
            @endif
        </h2>
        <div class="manage-actions">
            @unless(isset($keyword))
                <form action="{{ url('/manage/users/search') }}" method="get">
                    <input type="search" id="search-bar" class="search-bar" maxlength="50" placeholder="搜索..." name="keyword">
                    <i class="fa fa-search"></i>
                </form>
            @endunless
            {{--<a href="{{ url('/manage/users/add') }}" class="btn btn-default"><i class="fa fa-plus"></i> 新增用户</a>--}}
        </div>
        <div class="manage-lists">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td>用户名</td>
                        <td>真实姓名</td>
                        <td>用户类型</td>
                        <td>发布数</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->real_name }}</td>
                            <td>{{ $user->getRole() }}</td>
                            <td>{{ $user->productsCount() }}</td>
                            <td>
                                <a href="{{ action('ManageController@editUser', ['id' => $user->id]) }}" class="btn btn-success btn-sm">编辑</a>
                                <a data-id="{{ $user->id }}" href="javascript:;" onclick="deleteUser($(this))" class="btn btn-danger btn-sm">删除</a>
                            </td>
                        </tr>
                    @empty
                        <tr class="active">
                            <td>无</td>
                            <td>无任何用户</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if(method_exists($users, 'links'))
                <div class="text-center">
                    <p>{!! $users->links() !!}</p>
                </div>
            @endif
        </div>
    </div>
@stop

@section('footer-script')
    <script>
        function deleteUser(el) {
            if (confirm("确定要删除该用户吗?")) {
                $.ajax({
                    url: "{{ url('/manage/user/') }}/" + el.attr('data-id'),
                    type: "DELETE",
                    data: {_token: "{{ csrf_token() }}"},
                    dataType: "json",
                    success: function(json) {
                        if (json.status == "success") {
                            window.location.href = "{{ url()->current() }}";
                        } else {
                            alert('删除用户失败,请重试');
                        }
                    }
                });
            }
        }
    </script>
@stop