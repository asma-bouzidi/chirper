<!-- resources/views/chirps/index.blade.php -->
<x-layout>
    <!-- 🌿 Navigation Bar -->
    <nav style="background:#f9f8f4; border-bottom:1px solid #e6e2d3; padding:12px 30px;
                display:flex; justify-content:space-between; align-items:center;">
        <div style="font-family:Georgia,serif; font-size:22px; color:#556b2f; font-weight:bold;">
            Chirper 🕊️
        </div>

        <div style="display:flex; gap:18px; align-items:center;">
            <a href="{{ route('chirps.index') }}" 
               style="text-decoration:none; color:#444; font-weight:600;">Home</a>

            <a href="{{ route('chirps.create') }}" 
               style="text-decoration:none; color:#444; font-weight:600;">New Chirp</a>

            <span style="font-size:14px; color:#666;">
                Logged in as <strong>{{ auth()->user()->name }}</strong>
            </span>

            <!-- Logout Form -->
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" 
                        style="background:#8b2b2b; color:#fff; border:none; border-radius:6px;
                               padding:6px 12px; cursor:pointer; font-weight:600;">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <!-- 🕊️ Page Content -->
    <x-slot:title>All Chirps</x-slot:title>

    <div style="max-width:800px;margin:40px auto;padding:0 16px">
        <h1 style="font-family: Georgia, serif; font-size:36px; margin-bottom:12px; color:#2e2e2e;">
            All Chirps
        </h1>

        <!-- ✍️ Create a new chirp -->
        <div style="margin-bottom:25px;">
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
                    style="margin-top:8px;padding:8px 14px;background:#556b2f;color:#fff;
                           border:none;border-radius:6px;cursor:pointer;">
                    Post
                </button>
            </form>
        </div>

        <!-- 💬 Chirps list -->
        @forelse ($chirps as $chirp)
            <div style="display:flex;justify-content:space-between;align-items:flex-start;
                        background:#fff;border:1px solid #e6e2d3;border-radius:8px;
                        padding:12px 14px;margin-bottom:12px;box-shadow:0 2px 4px rgba(0,0,0,0.05);">
                
                <!-- Chirp content -->
                <div style="flex:1;">
                    <div style="font-weight:700;margin-bottom:6px;color:#333;">
                        {{ $chirp->user->name }}
                    </div>
                    <div style="margin-bottom:8px;font-size:15px;color:#555;">
                        {{ $chirp->message }}
                    </div>
                    <div style="font-size:12px;color:#999;">
                        {{ $chirp->created_at->diffForHumans() }}
                    </div>
                </div>

                <!-- Edit / Delete only for the chirp owner -->
                @if(auth()->check() && $chirp->user_id === auth()->id())
                    <div style="margin-left:12px;display:flex;flex-direction:column;gap:8px;align-items:flex-end;">
                        <!-- Edit -->
                        <a href="{{ route('chirps.edit', $chirp) }}"
                           style="text-decoration:none;padding:6px 10px;border-radius:6px;
                                  border:1px solid #556b2f;background:#f8f8f3;
                                  color:#556b2f;font-weight:600;display:flex;align-items:center;gap:6px;">
                            ✏️ Edit
                        </a>

                        <!-- Delete -->
                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}" style="margin:0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="padding:6px 10px;border-radius:6px;border:1px solid #8b2b2b;
                                       background:#8b2b2b;color:#fff;font-weight:600;cursor:pointer;
                                       display:flex;align-items:center;gap:6px;">
                                🗑️ Delete
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        @empty
            <p style="color:#666;font-style:italic;">No chirps yet. Be the first to post!</p>
        @endforelse
    </div>
</x-layout>
