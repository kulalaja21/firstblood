<!-- resources/views/profiles/create.blade.php -->
<h1>Create Profile</h1>

<form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Name: <input type="text" name="name"></label><br>
    <label>Email: <input type="email" name="email"></label><br>
    <label>Contact: <input type="text" name="contact"></label><br>
    <label>Objectives: <textarea name="objectives"></textarea></label><br>
    <label>Birthdate: <input type="date" name="birthdate"></label><br>
    <label>Age: <input type="number" name="age"></label><br>
    <label>Summary: <textarea name="summary"></textarea></label><br>
    <label>Profile Image: <input type="file" name="profile_image"></label><br>
    <label>Job Experiences: <textarea name="job_experiences[]"></textarea></label><br>

    <button type="submit">Save</button>
</form>