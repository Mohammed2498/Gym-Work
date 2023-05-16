<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($subscriber_id)
    {
        $subscribers=Subscriber::all();
        return view('admin.subscriptions.create', compact('subscriber_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validate the form inputs
        $validatedData = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:active,expired,canceled',
        ]);

        // Assign the subscriber ID from the request
        $subscriberId = $request->input('subscriber_id');

        // Create the subscription using mass assignment and the subscriber ID
        $subscription = Subscription::create([
            'subscriber_id' => $subscriberId,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'status' => $validatedData['status'],
        ]);

        // Redirect back to the subscriber index view
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscription created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
