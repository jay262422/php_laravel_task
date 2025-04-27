@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Fixed Deposit</h1>

    <form method="POST" action="{{ route('fixed_deposits.store') }}">
        @csrf

        <div class="mb-3">
            <label for="bank_name" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name" required>
        </div>

        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" required>
        </div>

        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>

        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" required>
        </div>

        <button type="submit" class="btn btn-primary">Save Fixed Deposit</button>
    </form>
</div>
@endsection
