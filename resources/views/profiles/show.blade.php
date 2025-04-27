<x-layout>
    <h2>{{ $profile->name }}'s Profile</h2>

    {{-- profile info --}}
    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill level:</strong> {{ $profile->skill }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $profile->bio }}</p>
    </div>

    {{-- delete button --}}
    <form action="{{ route('profiles.destroy', $profile->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn my-4">Delete profile</button>
    </form>
    <form action="{{ route('profiles.edit', $profile->id) }}" method="POST">
        @csrf
        @method('get')

        <button type="submit" class="btn my-4">Update profile</button>
    </form>

</x-layout>
