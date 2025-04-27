@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fixed Deposits</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('fixed_deposits.create') }}" class="btn btn-primary mb-3">Add New Fixed Deposit</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Bank Name</th>
                <th>Amount</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deposits as $deposit)
            <tr>
                <td>{{ $deposit->bank_name }}</td>
                <td>{{ number_format($deposit->amount, 2) }}</td>
                <td>{{ \Carbon\Carbon::parse($deposit->start_date)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($deposit->end_date)->format('d-m-Y') }}</td>
                <td>
                    <a href="{{ route('fixed_deposits.edit', $deposit->id) }}" class="btn btn-warning">Edit</a>

                    <!-- Delete Form -->
                    <form action="{{ route('fixed_deposits.destroy', $deposit->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this fixed deposit?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
