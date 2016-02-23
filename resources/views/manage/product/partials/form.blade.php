<form action="{{ $action_url }}" method="{{ $method }}" class="form-horizontal col-lg-12" id="form">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="" class="col-lg-2">
            *类型
        </label>
        <div class="col-lg-10">
            <div class="radio-inline">
                <input type="radio" name="status" value="provide"{{ old('status') == "provide" ? " checked" : $product->status == "provide" ? " checked" : "" }}>供
            </div>
            <div class="radio-inline">
                <input type="radio" name="status" value="demand"{{ old('status') == "demand" ? " checked" : $product->status == "demand" ? " checked" : "" }}>求
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *标题
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $product->title }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *联系姓名
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="contact_name" value="{{ old('contact_name') ? old('contact_name') : $product->contact_name ? $product->contact_name : Auth::user()->real_name }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *联系电话
        </label>
        <div class="col-lg-10">
            <input type="tel" class="form-control" name="phone" value="{{ old('phone') ? old('phone') : $product->phone ? $product->phone : Auth::user()->coop_phone }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *联系邮箱
        </label>
        <div class="col-lg-10">
            <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $product->email ? $product->email : Auth::user()->email }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            手机号码
        </label>
        <div class="col-lg-10">
            <input type="tel" class="form-control" name="cellphone" value="{{ old('cellphone') ? old('cellphone') : $product->cellphone ? $product->cellphone : Auth::user()->cellphone }}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *上市时间
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="release_date" value="{{ old('release_date') ? old('release_date') : $product->release_date }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *联系地址
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="address" value="{{ old('address') ? old('address') : $product->address }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">淘宝地址</label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="taobao" value="{{ old('taobao') ? old('taobao') : $product->taobao }}">
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            所属分类
        </label>
        <div class="col-lg-10">
            <select name="category_id" id="" class="form-control">
                @forelse(\App\Category::allSubCategories() as $category)
                    <option value="{{ $category->id }}"{{ $product->category ? $product->category->id == $category->id ? " selected" : "" : "" }}>{{ $category->name }}</option>
                @empty
                    <option value="0">无</option>
                @endforelse
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            *最新报价
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="pricing" value="{{ old('pricing') ? old('pricing') : $product->pricing }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            产品详情
        </label>
        <div class="col-lg-10">
            <script id="editor" type="text/plain" style="width:100%;height:500px;"></script>
        </div>
        <div class="row">
            <div class="col-lg-10 col-lg-offset-2">
                <div id="dropzone-holder">

                </div>
            </div>
        </div>
    </div>
    @if(Auth::user()->isManager())
        <div class="form-group">
            <label for="" class="col-lg-2">
                是否置顶
            </label>
            <div class="col-lg-10">
                <div class="radio-inline">
                    <input type="radio" value="1" name="is_sticky"{{ $product->is_sticky == 1 ? " checked" : "" }}>是
                </div>
                <div class="radio-inline">
                    <input type="radio" value="0" name="is_sticky"{{ $product->is_sticky == 0 ? " checked" : "" }}>否
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="" class="col-lg-2">
                是否精品
            </label>
            <div class="col-lg-10">
                <div class="radio-inline">
                    <input type="radio" value="1" name="is_essential"{{ $product->is_essential == 1 ? " checked" : "" }}>是
                </div>
                <div class="radio-inline">
                    <input type="radio" value="0" name="is_essential"{{ $product->is_essential == 0 ? " checked" : "" }}>否
                </div>
            </div>
        </div>
    @endif
    <div class="form-group">
        <div class="col-lg-10 col-lg-offset-2">
            <button type="submit" class="btn btn-success col-sm-12">{{ $action_button }}</button>
        </div>
    </div>
</form>
<div class="col-lg-10 col-lg-offset-2">
    <form id="dropzone-form" action="{{ url('products/upload') }}" method="POST" class="dropzone">
        {!! csrf_field() !!}
    </form>
</div>