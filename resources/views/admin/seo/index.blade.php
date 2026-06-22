<a href="{{ route('seo-manager.seo.create') }}">
    Add SEO
</a>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Page Title</th>
            <th>Page Slug</th>
            <th>Meta Title</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse($seos as $seo)
            <tr>
                <td>{{ $seo->id }}</td>
                <td>{{ $seo->page_title }}</td>
                <td>{{ $seo->page_slug }}</td>
                <td>{{ $seo->meta_title }}</td>

                <td>
                    <a href="{{ route('admin.seo.edit', $seo->id) }}">
                        Edit
                    </a>

                    <form action="{{ route('admin.seo.destroy', $seo->id) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button type="submit" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">
                    No records found.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
