@extends('layouts.app')

@section('content')
    <section class="form">
        <h2>Create Product</h2>
        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="field">
                <label for="name">Name</label>
                <input id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="field">
                <label for="price">Price</label>
                <input id="price" type="number" step="0.01" name="price" value="{{ old('price') }}" min="0" required>
            </div>
            <div class="field">
                <label for="quantity">Quantity</label>
                <input id="quantity" type="number" name="quantity" value="{{ old('quantity', 0) }}" min="0" required>
            </div>
            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
            </div>
            <div class="actions">
                <button class="btn btn-primary" type="submit">Save Product</button>
                <a class="btn btn-soft" href="{{ route('products.index') }}">Cancel</a>
            </div>
        </form>
    </section>
@endsection