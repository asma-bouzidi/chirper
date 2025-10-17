<x-layout>
    <x-slot:title>Edit Chirp</x-slot:title>

    <h1>Edit Chirp</h1>

    <form method="POST" action="{{ route('chirps.update', $chirp) }}">
        @csrf
        @method('PUT')

        <label for="message">Message:</label>
        <input type="text" name="message" id="message" value="{{ old('message', $chirp->message) }}" required>

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('chirps.index') }}">Back</a>
</x-layout>
