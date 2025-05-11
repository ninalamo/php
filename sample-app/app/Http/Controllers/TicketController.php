<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // Display a list of tickets.
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    // Show the form for creating a new ticket.
    public function create()
    {
        return view('tickets.create');
    }

    // Store a new ticket in the database.
    public function store(Request $request)
    {
        // Validate the request data.
        $validated = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
            'severity'      => 'required|in:Low,Medium,High,Critical',
            'status'        => 'required|in:Open,In Progress,Resolved,Closed',
            'created_by'    => 'required|integer',
            'assigned_to'   => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'remarks'       => 'nullable|string',
        ]);

        Ticket::create($validated);
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully!');
    }

    // Display a specific ticket.
    public function show(Ticket $ticket)
    {
        return view('tickets.show', compact('ticket'));
    }

    // Show the form for editing a ticket.
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', compact('ticket'));
    }

    // Update the specified ticket.
    public function update(Request $request, Ticket $ticket)
    {
        $validated = $request->validate([
            'title'         => 'required|max:255',
            'description'   => 'required',
            'severity'      => 'required|in:Low,Medium,High,Critical',
            'status'        => 'required|in:Open,In Progress,Resolved,Closed',
            'created_by'    => 'required|integer',
            'assigned_to'   => 'nullable|integer',
            'department_id' => 'nullable|integer',
            'remarks'       => 'nullable|string',
        ]);

        $ticket->update($validated);
        return redirect()->route('tickets.index')->with('success', 'Ticket updated successfully!');
    }

    // Remove the specified ticket.
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index')->with('success', 'Ticket deleted successfully!');
    }
}