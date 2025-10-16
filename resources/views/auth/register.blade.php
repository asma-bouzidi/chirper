<x-layout>
    <x-slot:title>Register</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Register</h1>

    <form method="POST" action="{{ route('register') }}" class="bg-white p-6 rounded shadow-md w-1/2">
        @csrf

        <div class="mb-4">
            <label>Name:</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Email:</label>
            <input type="email" name="email" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Password:</label>
            <input type="password" name="password" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
    </form>
</x-layout>
