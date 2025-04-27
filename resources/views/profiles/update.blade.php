<x-layout>
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST">
        <!-- CSRF token for security -->
        @csrf
        @method('PUT') <!-- Make sure it's a PUT request -->

        <h2>Update profile</h2>

        <!-- profile Name -->
        <label for="name">profile Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $profile->name) }}" required>

        <!-- profile Strength -->
        <label for="skill">profile Skill (0-100):</label>
        <input type="number" id="skill" name="skill" value="{{ old('skill', $profile->skill) }}" required>

        <!-- profile Bio -->
        <label for="bio">Biography:</label>
        <textarea rows="5" id="bio" name="bio" required>{{ old('bio', $profile->bio) }}</textarea>

        <button type="submit" class="btn mt-4">Update profile</button>

        <!-- validation errors -->
        @if ($errors->any())
            <ul class="px-4 py-2 bg-red-100">
                @foreach ($errors->all() as $error)
                    <li class="my-2 text-red-500">{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </form>
</x-layout>
