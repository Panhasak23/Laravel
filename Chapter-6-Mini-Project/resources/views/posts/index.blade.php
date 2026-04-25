@extends('layouts.app')

@section('title', 'Blog Posts')

@section('content')
<div class="animate-fade-in">
    <h1 class="page-title">Blog Posts</h1>
    
    <p style="margin-bottom: 2rem; color: #666;">
        Welcome to our blog! Browse through our latest articles on Laravel development, web technologies, and best practices.
    </p>

    @forelse($posts as $post)
        <article class="post-card">
            <div class="post-card-header">
                <h2 class="post-card-title">{{ $post['title'] }}</h2>
                <div class="post-card-meta">
                    <span>By {{ $post['author'] }}</span>
                    <span>&bull;</span>
                    <span>{{ \Carbon\Carbon::parse($post['date'])->format('F j, Y') }}</span>
                    <span>&bull;</span>
                    <span class="badge badge-success">{{ $post['category'] }}</span>
                </div>
            </div>
            <div class="post-card-body">
                <p class="post-excerpt">{{ $post['excerpt'] }}</p>
            </div>
            <div class="post-card-footer">
                <a href="{{ route('posts.show', $post['id']) }}" class="btn btn-primary">
                    Read More &rarr;
                </a>
            </div>
        </article>
    @empty
        <div class="empty-state">
            <div class="empty-state-icon">📝</div>
            <h3>No Posts Yet</h3>
            <p>Check back later for new articles!</p>
        </div>
    @endforelse
</div>
@endsection

