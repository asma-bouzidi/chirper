<x-layout>
    <x-slot:title>Create Product</x-slot:title>

    <h1>Create Product</h1>

    <form method="POST" action="{{ route('products.store') }}">
        @csrf
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" step="0.01" required><br><br>

        <button type="submit">Save</button>
    </form>
</x-layout>
