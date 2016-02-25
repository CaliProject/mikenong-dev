@extends('layouts.app')

@section('title', '产业新闻')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        产业新闻
                    </div>
                    <div class="panel-body">
                        <ul class="home-list">
                            @forelse($pages as $page)
                                <li>
                                    <p>
                                        <a href="{{ $page->link() }}">{{ $page->title }}</a>
                                        <span class="time">{{ $page->created_at->format('Y-m-d') }}</span>
                                    </p>
                                </li>
                            @empty
                                <li><p>暂无新闻</p></li>
                            @endforelse
                        </ul>
                    </div>
                    <nav class="home-pagination">
                        {!! $pages->links() !!}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@stop