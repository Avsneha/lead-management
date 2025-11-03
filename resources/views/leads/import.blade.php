@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Import Leads from Excel</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leads.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Select Excel File (.xlsx, .xls)</label>
            <input type="file" name="file" class="form-control" required>
        </div>
        <button class="btn btn-success">Import Leads</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
    </form>

    <div class="mt-3">
        <p><strong>Excel format:</strong> Name | Email | Phone | Status</p>
        <p>Status can be: New, In Progress, Closed</p>
    </div>
</div>
@endsection
