@extends('layouts.app')

@section('content')
    <h1>Ticket List</h1>

    @if(session('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tickets.create') }}">Create New Ticket</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Severity</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->title }}</td>
                    <td>{{ $ticket->severity }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>
                        <a href="{{ route('tickets.show', $ticket) }}">View</a>
                        <a href="{{ route('tickets.edit', $ticket) }}">Edit</a>
                        <form action="{{ route('tickets.destroy', $ticket) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?');">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection