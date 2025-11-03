@extends('layouts.app')

@section('content')
<div class="container mt-4">
   <h2>Dashboard</h2>
<p class="text-muted">Overview of all leads and their current status</p>


    <!-- Back to Lead Listing Page Button -->
    <div class="mb-3">
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">
           <i class="bi bi-arrow-left me-1"></i> Lead Listing
        </a>
    </div>

    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3 text-center" data-bs-toggle="tooltip" title="Total Leads">
                <div class="card-body">
                    <h5 class="card-title">Total Leads</h5>
                    <p class="card-text fs-1 fw-bold text-white">{{ $totalLeads }}</p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3 text-center" data-bs-toggle="tooltip" title="Leads that are newly added">
                <div class="card-body">
                    <h5 class="card-title">New Leads</h5>
                    <p class="card-text fs-1 fw-bold text-white">{{ $newLeads }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3 text-center" data-bs-toggle="tooltip" title="Leads that are in In progress">
                <div class="card-body">
                    <h5 class="card-title">In Progress</h5>
                    <p class="card-text fs-1 fw-bold text-white">{{ $inProgressLeads }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3 text-center" data-bs-toggle="tooltip" title="Leads that are closed">
                <div class="card-body">
                    <h5 class="card-title">Closed Leads</h5>
                    <p class="card-text fs-1 fw-bold text-white">{{ $closedLeads }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
