<x-layout>
    <x-slot:title>Edit Product</x-slot:title>

    <h1>Edit Product</h1>

    @if ($errors->any())
        <div class="errors">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ url('/products/'.$product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Name:</label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}">

        <label>Price:</label>
        <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}">

        <label>Description:</label>
        <textarea name="description">{{ old('description', $product->description) }}</textarea>

        <button type="submit">Update Product</button>
    </form>
</x-layout>
