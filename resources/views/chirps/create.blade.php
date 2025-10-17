<x-layout>
    <x-slot:title>Create Chirp</x-slot:title>

    <h1>Create a New Chirp</h1>

    <form method="POST" action="{{ route('chirps.store') }}">
        @csrf
        <label for="message">Message:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">Save</button>
    </form>
</x-layout>
