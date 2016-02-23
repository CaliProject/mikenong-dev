<form action="{{ $action_url }}" method="{{ $method }}" class="form-horizontal col-lg-12" id="form">
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="" class="col-lg-2">
            *标题
        </label>
        <div class="col-lg-10">
            <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $page->title }}" required>
        </div>
    </div>
    <div class="form-group">
        <label for="" class="col-lg-2">
            公告详情
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