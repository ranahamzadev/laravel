<x-layout>
    <form action="{{ route('profiles.store') }}" method="POST">
        <!-- CSRF token for security -->
        @csrf

        <h2>Create a New Profile</h2>

        <!-- profile Name -->
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>

        <!-- profile Strength -->
        <label for="skill">Skill (0-100):</label>
        <input type="number" id="skill" name="skill" value="{{ old('skill') }}" required>

        <!-- profile Bio -->
        <label for="bio">Biography:</label>
        <textarea rows="5" id="bio" name="bio" required>{{ old('bio') }}</textarea>


        <button type="submit" class="btn mt-4">Create Profile</button>

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
