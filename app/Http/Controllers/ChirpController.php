<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    // Show all chirps
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();

        return view('chirps.index', compact('chirps'));
    }

    // Store a new chirp
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Chirp::create([
            'message' => $request->message,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('chirps.index');
    }

    // Show the form to create a new chirp
    public function create()
    {
        return view('chirps.create');
    }

    // Edit and update chirp (for later steps)
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);

        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update(['message' => $request->message]);

        return redirect()->route('chirps.index');
    }

    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);
        $chirp->delete();

        return redirect()->route('chirps.index');
    }
}
