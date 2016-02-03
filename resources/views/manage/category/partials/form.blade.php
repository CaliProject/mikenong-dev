<form action="{{ $action_url }}" method="{{ $method }}" class="form-horizontal col-lg-8" id="category-form">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="" class="col-lg-2">
            分类名称
        </label>
        <div class="col-lg-8">
            <input type="text" class="form-control" name="name" value="{{ old('name') or $category->name }}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            所属分类
        </label>
        <div class="col-lg-8">
            <select class="form-control" name="parent_id" id="parent-select">
                <option value="0">无</option>
                @foreach($categories as $c)
                    @unless($category->id == $c->id)
                        <option value="{{ $c->id }}"{{ old('parent_id') == $c->id ? " selected" : '' }}{{ $category->parent_id == $c->id ? ' selected' : '' }}>{{ $c->name }}</option>
                    @endunless
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="col-lg-2 col-lg-offset-2">
            <button type="submit" class="btn btn-success">{{ $action_button }}</button>
        </div>
    </div>
</form>