<form action="{{ $url }}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}
    <div class="form-group">
        <label>种类</label>
        <input type="text" class="form-control" name="category" value="{{ old('category') ? old('category') : $pricing->category }}" required>
    </div>
    <div class="form-group">
        <label>农产品名称</label>
        <input type="text" class="form-control" name="market" value="{{ old('market') ? old('market') : $pricing->market }}" required>
    </div>
    <div class="form-group">
        <label>最低价格</label>
        <input type="text" class="form-control" name="min_price" value="{{ old('min_price') ? old('min_price') : $pricing->min_price }}" required>
    </div>
    <div class="form-group">
        <label>最高价格</label>
        <input type="text" class="form-control" name="max_price" value="{{ old('max_price') ? old('max_price') : $pricing->max_price }}" required>
    </div>
    <div class="form-group">
        <label>平均价格</label>
        <input type="text" class="form-control" name="avg_price" value="{{ old('avg_price') ? old('avg_price') : $pricing->avg_price }}" required>
    </div>
    <div class="form-group">
        <label>计量单位</label>
        <input type="text" class="form-control" name="measurement" value="{{ old('measurement') ? old('measurement') : $pricing->measurement }}" required>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-block btn-primary" value="{{ $button }}">
    </div>
</form>