@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Add New Lead</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leads.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="New" {{ old('status')=='New'?'selected':'' }}>New</option>
                <option value="In Progress" {{ old('status')=='In Progress'?'selected':'' }}>In Progress</option>
                <option value="Closed" {{ old('status')=='Closed'?'selected':'' }}>Closed</option>
            </select>
        </div>
        <button class="btn btn-primary">Add Lead</button>
        <a href="{{ route('leads.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
