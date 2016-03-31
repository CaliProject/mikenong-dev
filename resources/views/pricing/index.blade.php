@extends('layouts.app')

@section('title', '农产品报价')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        报价列表
                        @if(Auth::check())
                            @if(Auth::user()->isManager())
                                <div class="navbar-right" style="margin-right: 10px"><a href="{{ url('pricing/add') }}">新增报价 <i class="fa fa-plus"></i></a></div>
                            @endif
                        @endif
                    </div>
                    <div class="panel-body">
                        <table class="home-list table table-striped table-responsive">
                            <thead>
                            <tr>
                                <td>日期</td>
                                <td>种类</td>
                                <td>农产品名称</td>
                                <td>最低价格</td>
                                <td>最高价格</td>
                                <td>平均价格</td>
                                <td>计量单位</td>
                                @if(Auth::check())
                                    @if(auth()->user()->isManager())
                                        <td>操作</td>
                                    @endif
                                @endif
                            </tr>
                            </thead>
                            @forelse($pricings as $pricing)
                                <tr>
                                    <td>{{ $pricing->updated_at->format('Y-m-d') }}</td>
                                    <td>{{ $pricing->category }}</td>
                                    <td>{{ $pricing->market }}</td>
                                    <td style="text-align: left;">{{ $pricing->formatPrice('min_price') }}</td>
                                    <td style="text-align: left;">{{ $pricing->formatPrice('max_price') }}</td>
                                    <td style="text-align: left;">{{ $pricing->formatPrice('avg_price') }}</td>
                                    <td>{{ $pricing->measurement }}</td>
                                    @if(Auth::check())
                                        @if(auth()->user()->isManager())
                                            <td><a href="{{ action('HomeController@showEditPricing', ["id" => $pricing->id]) }}">编辑</a>&nbsp;<a data-id="{{ $pricing->id }}" href="javascript:;" onclick="deletePricing($(this))" style="color: darkred;">删除</a></td>
                                        @endif
                                    @endif
                                </tr>
                            @empty
                                <tr>
                                    <td><p>暂无报价</p></td>
                                </tr>
                            @endforelse
                        </table>
                        <nav class="home-pagination">
                            {!! $pricings->links() !!}
                        </nav>
                        {!! dd($pricings) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer-script')
    @if(Auth::check())
        @if(auth()->user()->isManager())
            <script>
                function deletePricing(el) {
                    if (confirm("确定要删除该报价吗?")) {
                        $.ajax({
                            url: "{{ url('/pricing/') }}/" + el.attr('data-id'),
                            type: "DELETE",
                            data: {_token: "{{ csrf_token() }}"},
                            dataType: "json",
                            success: function(json) {
                                if (json.status == "success") {
                                    window.location.href = "{{ url()->current() }}";
                                } else {
                                    alert('删除失败,请重试');
                                }
                            }
                        });
                    }
                }
            </script>
        @endif
    @endif
@stop