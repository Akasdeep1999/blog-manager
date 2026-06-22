<h1>Categories</h1>

<a href="{{ route('blog-manager.category.create') }}">
    Add Category
</a>

<hr>

@foreach ($categories as $category)
    <p>
        {{ $category->name }}
    </p>
@endforeach
