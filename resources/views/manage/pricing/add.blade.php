@extends('layouts.app')

@section('title', '添加报价')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                @include('manage.flash-message')
                <div class="row text-center">
                    <h3>添加报价</h3>
                </div>
                @include('manage.pricing.partials.form', [
                    "url" => url()->current(),
                    "button" => "新增",
                    "pricing" => new \App\Pricing
                ])
            </div>
            <div class="col-lg-3">
                @include('products.partials.sidebar_hottest')
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_images')
            </div>
        </div>
    </div>
@stop