@extends('layouts.app')

@section('title', $post['title'])

@section('content')
<div class="animate-fade-in">
    <a href="{{ route('posts.index') }}" class="back-link">
        &larr; Back to Blog Posts
    </a>

    <article class="blog-detail">
        <div class="blog-detail-header">
            <h1 class="blog-detail-title">{{ $post['title'] }}</h1>
            <div class="blog-detail-meta">
                <span><strong>Author:</strong> {{ $post['author'] }}</span>
                <span><strong>Date:</strong> {{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }}</span>
                <span><strong>Category:</strong> <span class="badge badge-success">{{ $post['category'] }}</span></span>
            </div>
        </div>
        <div class="blog-detail-body">
            <p class="blog-detail-content">{{ $post['content'] }}</p>
        </div>
    </article>

    <div style="margin-top: 2rem; text-align: center;">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">
            View All Posts
        </a>
    </div>
</div>
@endsection

