@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Leads</h2>
     @if(auth()->user()->isAdmin())
    <a href="{{ route('leads.create') }}" class="btn btn-primary mb-2">Add Lead</a>
    <a href="{{ route('leads.import.form') }}" class="btn btn-success mb-2">Import Leads</a>
     @endif
    <a href="{{ route('leads.export') }}" class="btn btn-warning mb-2">Export Leads</a>

    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th><th>Email</th><th>Phone</th><th>Status</th><th>Date Added</th>
                 @if(auth()->user()->isAdmin())
                <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($leads as $lead)
            <tr>
                <td>{{ $lead->name }}</td>
                <td>{{ $lead->email }}</td>
                <td>{{ $lead->phone }}</td>
                <td>{{ $lead->status }}</td>
                <td>{{ $lead->date_added }}</td>
                 @if(auth()->user()->isAdmin())
                <td>
                    <a href="{{ route('leads.history', $lead->id) }}" class="btn btn-sm btn-secondary">History</a>

                    <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ route('leads.delete', $lead->id) }}" method="POST" style="display:inline">
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete lead?')">Delete</button>
                    </form>
                </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
   {{ $leads->links('pagination::bootstrap-5') }}

</div>
@endsection
