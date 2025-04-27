<x-layout>
    <h2>Currently Available profiles</h2>

    <ul>
        @foreach ($profiles as $profile)
            <li>
                <x-card :highlight="$profile['skill'] > 70" href="{{ route('profiles.show', $profile->id) }}">
                    <div>
                        <h3>{{ $profile->name }}</h3>

                    </div>
                </x-card>
            </li>
        @endforeach
    </ul>

    {{ $profiles->links() }}
</x-layout>
