<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Guest;
use App\Models\Task;
use App\Models\Budget;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        // Retrieve all events
        $events = Event::all();

        // Return a response or render a view with the events
    }

    public function create(Request $request)
    {
        // Validate the request data
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required|date',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);

        // Create a new event
        $event = Event::create([
            'event_name' => $request->input('event_name'),
            'event_date' => $request->input('event_date'),
            'event_location' => $request->input('event_location'),
            'event_description' => $request->input('event_description'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function show(Event $event)
    {
        // Fetch the event details from the database
        $event = Event::findOrFail($event->id);

        // Return a response or render a view with the event details
    }

    public function update(Request $request, Event $event)
    {
        // Validate the request data
        $request->validate([
            'event_name' => 'required',
            'event_date' => 'required|date',
            'event_location' => 'required',
            'event_description' => 'required',
        ]);

        // Update the event details
        $event->update([
            'event_name' => $request->input('event_name'),
            'event_date' => $request->input('event_date'),
            'event_location' => $request->input('event_location'),
            'event_description' => $request->input('event_description'),
        ]);

        // Return a response or redirect to the event details page
    }

    public function delete(Event $event)
    {
        // Delete the event
        $event->delete();

        // Return a response or redirect to a different page
    }
}
