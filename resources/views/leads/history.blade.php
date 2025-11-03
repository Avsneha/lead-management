@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Lead History - {{ $lead->name }}</h3>

    <a href="{{ route('leads.index') }}" class="btn btn-secondary mb-3">← Back to Leads</a>

    @if($history->count() > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Old Status</th>
                    <th>New Status</th>
                    <th>Changed By</th>
                    <th>Changed At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($history as $entry)
                    <tr>
                        <td>{{ $entry->old_status ?? '-' }}</td>
                        <td>{{ $entry->new_status }}</td>
                        <td>{{ $entry->user->name ?? 'N/A' }}</td>
                        <td>{{ \Carbon\Carbon::parse($entry->changed_at)->format('d M Y, h:i A') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No status changes recorded for this lead.</p>
    @endif
</div>
@endsection
