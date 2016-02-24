@extends('layouts.app')

@section('title', '编辑报价')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @include('manage.flash-message')
                <div class="row text-center">
                    <h3>更新报价</h3>
                </div>
                @include('manage.pricing.partials.form', [
                    "url" => url()->current(),
                    "button" => "更新"
                ])
            </div>
            <div class="col-lg-4">
                @include('products.partials.sidebar_hottest')
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_images')
            </div>
        </div>
    </div>
@stop