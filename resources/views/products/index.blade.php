<x-layout>
    <x-slot:title>Products</x-slot:title>

    <h1>All Products</h1>
    <a href="{{ route('products.create') }}">Create New Product</a>

    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} — ${{ $product->price }}</li>
        @endforeach
    </ul>
</x-layout>
