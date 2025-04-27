@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Property</h1>

    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="property_name" class="form-label">Property Name</label>
            <input type="text" class="form-control" id="property_name" name="property_name" value="{{ $property->property_name }}" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $property->location }}" required>
        </div>
        <div class="mb-3">
            <label for="value" class="form-label">Value</label>
            <input type="number" class="form-control" id="value" name="value" value="{{ $property->value }}" required>
        </div>
        <div class="mb-3">
            <label for="purchase_date" class="form-label">Purchase Date</label>
            <input type="date" class="form-control" id="purchase_date" name="purchase_date" value="{{ $property->purchase_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>
</div>
@endsection
