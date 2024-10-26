<!-- resources/views/admin/backend/related_products_table.blade.php -->
@if($relateddatalist->count())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Thumbnail</th>
                <th>Published</th>
            </tr>
        </thead>
        <tbody>
            @foreach($relateddatalist as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->title }}</td>
                    <td><img src="{{ $item->f_thumbnail }}" alt="{{ $item->title }}" width="50"></td>
                    <td>{{ $item->is_publish ? 'Yes' : 'No' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $relateddatalist->links() }}
@else
    <p>No related products found.</p>
@endif
