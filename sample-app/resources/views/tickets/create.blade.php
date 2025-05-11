@extends('layouts.app')

@section('content')
    <h1>Create New Ticket</h1>
    
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <div>
            <label>Title:</label>
            <input type="text" name="title" value="{{ old('title') }}" required>
        </div>
        <div>
            <label>Description:</label>
            <textarea name="description" required>{{ old('description') }}</textarea>
        </div>
        <div>
            <label>Severity:</label>
            <select name="severity" required>
                <option value="Low">Low</option>
                <option value="Medium">Medium</option>
                <option value="High">High</option>
                <option value="Critical">Critical</option>
            </select>
        </div>
        <div>
            <label>Status:</label>
            <select name="status" required>
                <option value="Open">Open</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Closed">Closed</option>
            </select>
        </div>
        <div>
            <label>Created By (User ID):</label>
            <input type="number" name="created_by" required>
        </div>
        <div>
            <label>Assigned To (User ID):</label>
            <input type="number" name="assigned_to">
        </div>
        <div>
            <label>Department ID:</label>
            <input type="number" name="department_id">
        </div>
        <div>
            <label>Remarks:</label>
            <textarea name="remarks">{{ old('remarks') }}</textarea>
        </div>
        <button type="submit">Create Ticket</button>
    </form>
@endsection