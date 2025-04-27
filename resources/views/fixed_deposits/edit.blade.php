<!-- resources/views/fixed_deposits/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Fixed Deposit</h1>

    <form action="{{ route('fixed_deposits.update', $fixedDeposit->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="bank_name" class="form-label">Bank Name</label>
            <input type="text" class="form-control" id="bank_name" name="bank_name" value="{{ $fixedDeposit->bank_name }}" required>
        </div>
        <div class="mb-3">
            <label for="amount" class="form-label">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" value="{{ $fixedDeposit->amount }}" required>
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $fixedDeposit->start_date }}" required>
        </div>
        <div class="mb-3">
            <label for="end_date" class="form-label">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $fixedDeposit->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Fixed Deposit</button>
    </form>
</div>
@endsection
