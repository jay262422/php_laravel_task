@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Stock</h1>

    <form action="{{ route('stocks.update', $stock->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="stock_name" class="form-label">Stock Name</label>
            <input type="text" class="form-control" id="stock_name" name="stock_name" value="{{ $stock->stock_name }}" required>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $stock->quantity }}" required>
        </div>
        <div class="mb-3">
            <label for="purchase_price" class="form-label">Purchase Price</label>
            <input type="number" step="0.01" class="form-control" id="purchase_price" name="purchase_price" value="{{ $stock->purchase_price }}" required>
        </div>
        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ $stock->purchase_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Stock</button>
    </form>
</div>
@endsection
