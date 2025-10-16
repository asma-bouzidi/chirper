<x-layout>
    <x-slot:title>Login</x-slot:title>

    <h1 class="text-2xl font-bold mb-4">Login</h1>

    <form method="POST" action="{{ route('login') }}" class="bg-white p-6 rounded shadow-md w-1/2">
        @csrf

        <div class="mb-4">
            <label>Email:</label>
            <input type="email" name="email" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label>Password:</label>
            <input type="password" name="password" class="border p-2 w-full" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Login</button>
    </form>
</x-layout>
