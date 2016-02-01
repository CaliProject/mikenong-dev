@extends('manage.app')

@section('content')
    <div class="manage-container">
        @include('manage.flash-message')
        <h2>{{ $title }}</h2>
        <div class="manage-actions">
            <form action="{{ url('manage/category/add') }}" method="POST" class="form-horizontal col-lg-8" id="category-form">
                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        分类名称
                    </label>
                    <div class="col-lg-8">
                        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="col-lg-2">
                        所属分类
                    </label>
                    <div class="col-lg-8">
                        <select class="form-control" name="parent_id" id="parent-select">
                            <option value="0">无</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}"{{ old('parent_id') == $category->id ? " selected" : "" }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-2 col-lg-offset-2">
                        <button type="submit" class="btn btn-success">新建</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop