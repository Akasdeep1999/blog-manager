<h1>Create Seo</h1>

<form action="{{ route('seo-manager.seo.store') }}" method="POST" enctype="multipart/form-data">

    @csrf

    <div>
        <label>Page Title</label>
        <input type="text" name="page_title" value="{{ old('page_title') }}">
    </div>

    <div>
        <label>Page Slug</label>
        <input type="text" name="page_slug" value="{{ old('page_slug') }}">
    </div>

    <div>
        <label>Meta Title</label>
        <input type="text" name="meta_title" value="{{ old('meta_title') }}">
    </div>

    <div>
        <label>Meta Keyword</label>
        <input type="text" name="meta_keyword" value="{{ old('meta_keyword') }}">
    </div>

    <div>
        <label>Meta Description</label>
        <textarea name="meta_description">{{ old('meta_description') }}</textarea>
    </div>

    <div>
        <label>Author</label>
        <input type="text" name="author" value="{{ old('author') }}">
    </div>

    <div>
        <label>Locale</label>
        <input type="text" name="locale" value="{{ old('locale', 'en_US') }}">
    </div>

    <div>
        <label>OG Title</label>
        <input type="text" name="og_title" value="{{ old('og_title') }}">
    </div>

    <div>
        <label>OG Image</label>
        <input type="file" name="ogimage">
    </div>

    <div>
        <label>OG Description</label>
        <textarea name="og_description">{{ old('og_description') }}</textarea>
    </div>

    <div>
        <label>Twitter Card</label>
        <input type="text" name="twitter_card" value="{{ old('twitter_card', 'summary_large_image') }}">
    </div>

    <div>
        <label>Twitter Site</label>
        <input type="text" name="twitter_site" value="{{ old('twitter_site') }}">
    </div>

    <div>
        <label>Twitter Title</label>
        <input type="text" name="twitter_title" value="{{ old('twitter_title') }}">
    </div>

    <div>
        <label>Twitter Description</label>
        <textarea name="twitter_description">{{ old('twitter_description') }}</textarea>
    </div>

    <div>
        <label>Twitter Image</label>
        <input type="file" name="twitter_image">
    </div>

    <button type="submit">
        Save
    </button>

</form>
