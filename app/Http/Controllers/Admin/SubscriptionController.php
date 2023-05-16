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
    public function create(Subscriber $subscriber)
    {
        $subscribers=Subscriber::all();
        return view('admin.subscriptions.create', compact('subscriber','subscribers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subscriber_id' => 'required|exists:subscribers,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|in:expired,active,canceled',
        ]);
        Subscription::create($validatedData);
        return redirect()->route('admin.subscriptions.index')->with('success', 'Subscription created successfully');
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
