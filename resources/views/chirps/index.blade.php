<x-layout>
    <x-slot:title>All Chirps</x-slot:title>

    <div class="chirps-container">
        <h1>All Chirps</h1>

        <a href="{{ route('chirps.create') }}" class="create-chirp-link">Create a Chirp</a>

        @forelse ($chirps as $chirp)
            <div class="chirp-card">
                <div class="chirp-user">{{ $chirp->user->name }}</div>
                <div class="chirp-message">{{ $chirp->message }}</div>
                <div class="chirp-time">{{ $chirp->created_at->diffForHumans() }}</div>

                @if ($chirp->user_id === auth()->id())
                    <div class="chirp-actions">
                        <a href="{{ route('chirps.edit', $chirp) }}">Edit</a>
                        <form action="{{ route('chirps.destroy', $chirp) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p>No chirps yet.</p>
        @endforelse
    </div>
</x-layout>
