<form action="{{ route('admin.team.update',$member->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" value="{{ $member->name }}" required>
    <input type="file" name="image">
    <button type="submit">Update</button>
</form>
