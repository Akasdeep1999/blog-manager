<h1>Create Category</h1>

<form method="POST" action="{{ route('blog-manager.category.store') }}">

    @csrf

    <input type="text" name="name" placeholder="Category Name">

    <br><br>

    <br><br>

    <button type="submit">Save</button>
</form>
