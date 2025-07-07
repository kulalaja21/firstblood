<!-- resources/views/profiles/create.blade.php -->
<h1>Create Profile</h1>

<!-- Display validation errors -->
@if ($errors->any())
    <div style="color: red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Name:</label>
    <input type="text" name="name" value="{{ old('name') }}"><br><br>

    <label>Email:</label>
    <input type="email" name="email" value="{{ old('email') }}"><br><br>

    <label>Contact:</label>
    <input type="text" name="contact" value="{{ old('contact') }}"><br><br>

    <label>Objectives:</label>
    <textarea name="objectives">{{ old('objectives') }}</textarea><br><br>

    <label>Birthdate:</label>
    <input type="date" name="birthdate" value="{{ old('birthdate') }}"><br><br>

    <label>Age:</label>
    <input type="number" name="age" value="{{ old('age') }}"><br><br>

    <label>Summary:</label>
    <textarea name="summary">{{ old('summary') }}</textarea><br><br>

    <label>Profile Image:</label>
    <input type="file" name="profile_image"><br><br>

     <label>Job Experiences:</label>
    <textarea name="job_experiences">{{ old('job_experiences') }}</textarea><br><br> 

    <button type="submit">Save</button>
</form>