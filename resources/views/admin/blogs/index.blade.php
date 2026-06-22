<h1>Posts</h1>

<a href="{{ route('blog-manager.posts.create') }}">
    Add Post
</a>

<hr>

@foreach ($blogs as $blog)
    <div style="margin-bottom:20px">
        <h3>{{ $blog->title }}</h3>

        <p>
            Category:
            {{ $blog->category?->name }}
        </p>

        <p>Status: {{ $blog->status }}</p>
    </div>
@endforeach
