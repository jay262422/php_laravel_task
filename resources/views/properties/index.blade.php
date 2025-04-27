@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>

    <a href="{{ route('properties.create') }}" class="btn btn-success mb-3">Add New Property</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Property Name</th>   <!-- Added -->
                <th>Location</th>
                <th>Value</th>
                <th>purchase_date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($properties as $property)
            <tr>
                <td>{{ $property->property_name }}</td> <!-- Added -->
                <td>{{ $property->location }}</td>
                <td>{{ $property->value }}</td>
                <td>{{ $property->purchase_date }}</td>
                <td>
                    <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach

            @if($properties->isEmpty())
            <tr>
                <td colspan="5" class="text-center">No properties found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
