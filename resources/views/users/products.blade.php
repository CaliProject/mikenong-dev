@extends('layouts.app')

@section('title', $user->real_name . '的产品列表')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-offset-1">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        {{ $user->real_name }}的产品列表
                    </div>
                    <div class="panel-body">
                        @include('products.partials.product_list', ["products" => $user->pagedProducts()])
                    </div>
                    <nav class="home-pagination">
                        {!! $user->pagedProducts()->links() !!}
                    </nav>
                </div>
            </div>
            <div class="col-md-3">
                @include('users.partials.sidebar')
            </div>
        </div>
    </div>
@stop