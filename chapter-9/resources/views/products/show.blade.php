@extends('layouts.app')

@section('content')
    <section class="card" style="margin-bottom: 18px;">
        <div class="actions" style="justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin-bottom: 6px;">{{ $product->name }}</h2>
                <p class="muted" style="margin: 0;">Product details using Eloquent record access.</p>
            </div>
            <div class="actions">
                <a class="btn btn-soft" href="{{ route('products.edit', $product) }}">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </section>

    <section class="card">
        <div class="meta">
            <div><strong>Price</strong><br><span class="muted">${{ number_format($product->price, 2) }}</span></div>
            <div><strong>Quantity</strong><br><span class="muted">{{ $product->quantity }}</span></div>
            <div><strong>Description</strong><br><span class="muted">{{ $product->description ?? 'N/A' }}</span></div>
        </div>
    </section>
@endsection