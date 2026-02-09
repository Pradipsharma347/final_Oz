<style>
    .team-form {
        max-width: 420px;
        margin: 30px auto;
        padding: 25px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        font-family: Arial, sans-serif;
    }

    .team-form h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #555;
    }

    .form-group input[type="text"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 10px;
        border-radius: 6px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .form-group input[type="file"] {
        padding: 6px;
    }

    .preview-img {
        margin-top: 10px;
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid #ddd;
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        background: #2563eb;
        color: white;
        border: none;
        border-radius: 6px;
        font-size: 15px;
        font-weight: bold;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .submit-btn:hover {
        background: #1e40af;
    }
</style>

<form class="team-form"
      action="{{ route('admin.team.update', $member->id) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf

    <h2>Update Team Member</h2>

    <div class="form-group">
        <label>Member Name</label>
        <input type="text" name="name" value="{{ $member->name }}" required>
    </div>

    <div class="form-group">
        <label>Profile Image</label>
        <input type="file" name="image">
    </div>

    @if($member->image)
        <img src="{{ asset('uploads/team/'.$member->image) }}" class="preview-img">
    @endif

    <button type="submit" class="submit-btn">
        Update Member
    </button>

</form>
