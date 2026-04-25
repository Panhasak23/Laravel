@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Product Catalog</h1>
    
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <p class="card-text">
                            <strong>Price:</strong> ${{ number_format($product['price'], 2) }}
                        </p>
                        <p class="card-text">
                            <strong>Status:</strong> 
                            @if($product['stock'] > 0)
                                <span class="text-success">In Stock</span>
                            @else
                                <span class="text-danger">Out of Stock</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection