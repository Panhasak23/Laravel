@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">Products</h2>
                <p class="muted" style="margin: 0;">A separate Eloquent CRUD example for the assignment.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
        </div>
    </section>

    <section class="table">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>${{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-soft" href="{{ route('products.show', $product) }}">View</a>
                                <a class="btn btn-soft" href="{{ route('products.edit', $product) }}">Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4">No products found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </section>
@endsection