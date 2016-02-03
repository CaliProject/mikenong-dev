@extends('manage.app')

@if(isset($keyword))
    @section('title', $keyword . '的相关产品')
@else
    @section('title', '产品管理')
@endif

@section('content')
    <div class="manage-container">
        <h2>
            @if(isset($keyword))
                {{ $keyword . '的相关产品' }}
            @else
                产品管理
            @endif
        </h2>
        <div class="manage-actions">
            @unless(isset($keyword))
                <form class="search-form" action="{{ url('/manage/products/search') }}" method="get">
                    <input type="search" id="search-bar" class="search-bar" maxlength="50" placeholder="搜索..." name="keyword">
                    <i class="fa fa-search"></i>
                </form>
            @endunless
            <a href="{{ url('/manage/product/add') }}" class="btn btn-default"><i class="fa fa-plus"></i> 新增产品</a>
        </div>
        <div class="manage-lists">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <td>供求类型</td>
                    <td>产品名</td>
                    <td>发布用户</td>
                    <td>发布时间</td>
                    <td>所属类别</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>{{ $product->readableStatus() }}</td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->user->name }}</td>
                        <td>{{ $product->created_at->format('Y年m月d日') }}</td>
                        <td>{{ $product->category ? $product->category->name : "无" }}</td>
                        <td>
                            <a href="{{ action('ManageController@editProduct', ['id' => $product->id]) }}" class="btn btn-success btn-sm">编辑</a>
                            <a data-id="{{ $product->id }}" href="javascript:;" onclick="deleteProduct($(this))" class="btn btn-danger btn-sm">删除</a>
                        </td>
                    </tr>
                @empty
                    <tr class="active">
                        <td>无</td>
                        <td>无任何产品</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            @if(method_exists($products, 'links'))
                <div class="text-center">
                    <p>{!! $products->links() !!}</p>
                </div>
            @endif
        </div>
    </div>
@stop

@section('footer-script')
    <script>
        function deleteProduct(el) {
            if (confirm("确定要删除该用户吗?")) {
                $.ajax({
                    url: "{{ url('/manage/product/') }}/" + el.attr('data-id'),
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