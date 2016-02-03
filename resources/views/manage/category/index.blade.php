@extends('manage.app')

@section('title', '分类管理')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>分类管理</h2>
        <div class="manage-actions">
            <a href="{{ url('/manage/category/add') }}" class="btn btn-default"><i class="fa fa-plus"></i> 新增分类</a>
        </div>
        <div class="manage-lists">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>分类名称</td>
                        <td>所属分类</td>
                        <td>操作</td>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)
                        <tr class="success">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parentName() }}</td>
                            <td>
                                <a href="{{ action('ManageController@editCategory', ['id' => $category->id]) }}" class="btn btn-success btn-sm">编辑</a>
                                <a data-id="{{ $category->id }}" href="javascript:;" onclick="deleteCategory($(this))" class="btn btn-danger btn-sm">删除</a>
                            </td>
                        </tr>
                        @forelse($category->getSubCategories() as $subCategory)
                            <tr>
                                <td>{{ $subCategory->id }}</td>
                                <td>{{ $subCategory->name }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ action('ManageController@editCategory', ['id' => $subCategory->id]) }}" class="btn btn-success btn-sm">编辑</a>
                                    <a data-id="{{ $subCategory->id }}" href="javascript:;" onclick="deleteCategory($(this))" class="btn btn-danger btn-sm">删除</a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    @empty
                        <tr class="active">
                            <td>0</td>
                            <td>无任何分类</td>
                            <td></td>
                            <td></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('footer-script')
    <script>
        function deleteCategory(el) {
            if (confirm('确定要删除该分类吗? 子分类也将删除')) {
                $.ajax({
                    url: "{{ url('manage/category/') }}/" + el.attr('data-id'),
                    type: 'DELETE',
                    dataType: 'json',
                    data: {_token: "{{ csrf_token() }}", id: el.attr('data-id')},
                    success: function(json) {
                        if (json.status == "success") {
                            window.location.href = "{{ url('/manage/categories') }}";
                        } else {
                            alert(json.message);
                        }
                    }
                });
            }
        }
    </script>
@endsection