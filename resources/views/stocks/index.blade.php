@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Stocks</h1>

    <a href="{{ route('stocks.create') }}" class="btn btn-primary mb-3">Add New Stock</a>

    @if($stocks->isEmpty())
        <p>No stocks found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stock Name</th>
                    <th>Quantity</th>
                    <th>Purchase Price</th>
                    <th>Purchase Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stocks as $stock)
                <tr>
                    <td>{{ $stock->stock_name }}</td>
                    <td>{{ $stock->quantity }}</td>
                    <td>{{ $stock->purchase_price }}</td>
                    <td>{{ $stock->purchase_date }}</td>
                    <td>
                        <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        
                        <form action="{{ route('stocks.destroy', $stock->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
