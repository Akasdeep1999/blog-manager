<h1>Create Post</h1>

<form method="POST" action="{{ route('blog-manager.posts.store') }}" enctype="multipart/form-data">

    @csrf

    <div>
        <label>Title</label>
        <input type="text" name="title" value="{{ old('title') }}">
    </div>

    <br>

    <div>
        <label>Category</label>

        <select name="category_id">
            <option value="">Select Category</option>

            @foreach ($categories as $category)
                <option value="{{ $category->id }}">
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <br>

    <div>
        <label>Description</label>

        <textarea name="description" rows="10" cols="50">{{ old('description') }}</textarea>
    </div>

    <br>

    <div>
        <label>Featured Image</label>
        <input type="file" name="image">
    </div>

    <br>

    <div>
        <input type="hidden" name="status" value="0">

        <label>
            <input type="checkbox" name="status" value="1">
            Published
        </label>
    </div>

    <hr>

    <h3>SEO Information</h3>

    <div>
        <label>Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title') }}">
    </div>

    <br>

    <div>
        <label>Meta Keyword</label>
        <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}">
    </div>

    <br>

    <div>
        <label>Meta Description</label>

        <textarea name="meta_description" rows="4" cols="50">{{ old('meta_description') }}</textarea>
    </div>

    <br>

    <div>
        <label>OG Title</label>
        <input type="text" name="og_title" value="{{ old('og_title') }}">
    </div>

    <br>

    <div>
        <label>OG Description</label>

        <textarea name="og_description" rows="4" cols="50">{{ old('og_description') }}</textarea>
    </div>

    <br>

    <div>
        <label>OG Image</label>
        <input type="file" name="ogImage">
    </div>

    <br>

    <button type="submit">Save</button>

</form>
