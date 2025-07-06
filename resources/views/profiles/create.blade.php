@extends('layouts.app')

@section('content')
<style>
    .resume-form {
        max-width: 600px;
        margin: 0 auto;
        padding: 2rem;
        background-color: #f9f9f9;
        border-radius: 12px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        font-family: Arial, sans-serif;
    }

    .resume-form h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: #333;
    }

    .resume-form label {
        display: block;
        margin-top: 1rem;
        font-weight: bold;
        color: #444;
    }

    .resume-form input[type="text"],
    .resume-form input[type="email"],
    .resume-form input[type="file"],
    .resume-form textarea {
        width: 100%;
        padding: 0.6rem;
        margin-top: 0.3rem;
        border: 1px solid #ccc;
        border-radius: 6px;
        box-sizing: border-box;
        font-size: 1rem;
    }

    .resume-form textarea {
        min-height: 100px;
    }

    .resume-form button {
        margin-top: 1.5rem;
        width: 100%;
        background-color: #007bff;
        color: white;
        border: none;
        padding: 0.75rem;
        font-size: 1rem;
        border-radius: 6px;
        cursor: pointer;
    }

    .resume-form button:hover {
        background-color: #0056b3;
    }
</style>

<div class="resume-form">
    <h2>Profile Details</h2>

    <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data">
        @csrf

        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Contact</label>
        <input type="text" name="contact">

        <label>Profile Image</label>
        <input type="file" name="profile_image">

        <label>Summary</label>
        <textarea name="summary"></textarea>

        <label>Job Experience</label>
        <textarea name="job_experiences"></textarea>

        <button type="submit">Save</button>
    </form>
</div>
@endsection