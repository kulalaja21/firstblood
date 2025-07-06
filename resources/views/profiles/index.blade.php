<h1>Developer Profile</h1>

@forelse ($profiles as $profile)
    <div style="margin-bottom: 30px; padding: 20px; border: 1px solid #ccc;">
        <h2>{{ $profile->name }}</h2>

        <p><strong>Email:</strong> {{ $profile->email }}</p>
        <p><strong>Contact:</strong> {{ $profile->contact }}</p>

        <p><strong>Objectives:</strong> {{ $profile->objectives }}</p>

        <p><strong>Birthdate:</strong>
            {{ $profile->birthdate ? \Carbon\Carbon::parse($profile->birthdate)->format('m/d/Y') : 'N/A' }}
        </p>

        <p><strong>Age:</strong> {{ $profile->age ?? 'N/A' }}</p>

        <p><strong>Summary:</strong> {{ $profile->summary }}</p>

        @if ($profile->profile_image)
            <p><strong>Profile Image:</strong></p>
            <img src="{{ asset('storage/' . $profile->profile_image) }}" width="150">
        @else
            <p><em>No profile image uploaded.</em></p>
        @endif

        <p><strong>Job Experiences:</strong></p>
        @if (is_array($profile->job_experiences))
            <ul>
                @foreach ($profile->job_experiences as $job)
                    <li>{{ $job }}</li>
                @endforeach
            </ul>
        @elseif (is_string($profile->job_experiences))
            <p>{{ $profile->job_experiences }}</p>
        @else
            <p><em>No job experiences listed.</em></p>
        @endif
    </div>
@empty
    <p>No profiles found. <a href="{{ route('profiles.create') }}">Add your first profile</a></p>
@endforelse