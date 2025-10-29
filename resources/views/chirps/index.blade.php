<x-layout>
    <x-slot:title>All Chirps</x-slot:title>

    <div style="max-width:800px;margin:40px auto;padding:0 16px">
        <h1 style="font-family: Georgia, serif; font-size:36px; margin-bottom:12px; color:#3b4c2a;">
            All Chirps 🕊️
        </h1>

        <div style="margin-bottom:20px;">
            <form method="POST" action="{{ route('chirps.store') }}">
                @csrf
                <input
                    name="message"
                    type="text"
                    placeholder="Write a chirp..."
                    required
                    style="width:100%;padding:10px;border:1px solid #ccc;border-radius:6px;"
                >
                <button type="submit"
                        style="margin-top:8px;padding:8px 14px;background:#556b2f;color:#fff;border:none;border-radius:6px;cursor:pointer;">
                    Post
                </button>
            </form>
        </div>

        <!-- Chirps list -->
        @forelse ($chirps as $chirp)
            <div style="display:flex;justify-content:space-between;align-items:flex-start;
                        background:#fff;border:1px solid #e6e2d3;border-radius:8px;
                        padding:12px 14px;margin-bottom:12px;box-shadow:0 2px 4px rgba(0,0,0,0.05);">
                <div style="flex:1;">
                    <div style="font-weight:700;margin-bottom:6px;color:#4d5c34;">{{ $chirp->user->name }}</div>
                    <div style="margin-bottom:8px;">{{ $chirp->message }}</div>
                    <div style="font-size:12px;color:#777;">{{ $chirp->created_at->diffForHumans() }}</div>
                </div>

                @if(auth()->check() && $chirp->user_id === auth()->id())
                    <div style="margin-left:12px;display:flex;flex-direction:column;gap:8px;align-items:flex-end;">
                        <a href="{{ route('chirps.edit', $chirp) }}"
                           style="text-decoration:none;padding:6px 10px;border-radius:6px;
                                  border:1px solid #556b2f;background:#f0f0e8;color:#556b2f;
                                  font-weight:600;transition:0.2s;">
                           ✏️ Edit
                        </a>

                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    style="padding:6px 10px;border-radius:6px;border:1px solid #8b2b2b;
                                           background:#8b2b2b;color:#fff;font-weight:600;cursor:pointer;
                                           transition:0.2s;">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p style="text-align:center; color:#666;">No chirps yet. Be the first to post!</p>
        @endforelse
    </div>
</x-layout>
