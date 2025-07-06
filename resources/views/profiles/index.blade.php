<h1>Developer Profile</h1>

@forelse ($profiles as $profile)
    <div style="margin-bottom: 30px; padding: 20px; border: 1px solid #ccc;">
        <h2>{{ $profile->name }}</h2>
        <p><strong>Email:</strong> {{ $profile->email }}</p>
        <p><strong>Contact:</strong> {{ $profile->contact }}</p>

        @if ($profile->profile_image)
            <img src="{{ asset('storage/' . $profile->profile_image) }}" width="150">
        @else
            <p><em>No profile image uploaded.</em></p>
        @endif

        <p><strong>Summary:</strong> {{ $profile->summary }}</p>
    </div>
@empty
    <p>No profiles found. <a href="{{ route('profiles.create') }}">Add your first profile</a></p>
@endforelse