@extends('layouts.app')

@section('title', '米东特色')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="about-page">
                            <h2 class="about">米东特色</h2>
                            <div class="about-body">
                                {!! $about->body !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @include('layouts.partials.sidebar_news')
                @include('layouts.partials.sidebar_image')
                @include('products.partials.sidebar_latest')
                @include('products.partials.sidebar_hottest')
                @include('products.partials.sidebar_images')
            </div>
        </div>
    </div>
@stop