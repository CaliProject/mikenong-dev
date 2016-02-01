@extends('manage.app')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>{{ $title or '分类管理' }}</h2>
        <div class="manage-actions">
            <a href="{{ url('/manage/category/add') }}" class="btn btn-default"><i class="fa fa-plus"></i> 新增分类</a>
        </div>
        <div class="manage-lists">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>分类名称</td>
                        <td>所属分类</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->parentName() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop