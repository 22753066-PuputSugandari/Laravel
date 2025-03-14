<a href="{{ route('mapel.edit', $id) }}" class="btn btn-warning btn-sm">Edit</a>
<form action="{{ route('mapel.delete', $id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
</form>
