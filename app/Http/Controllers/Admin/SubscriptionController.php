<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Carbon\Carbon;


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
        $subscriber = Subscriber::findOrFail($subscriber_id);
        $start_date = Carbon::now()->toDateString();
        $end_date = Carbon::now()->addMonth()->toDateString();
        $duration = 1; // Default duration of 1 month
        return view('admin.subscriptions.create', compact('subscriber_id','subscriber', 'start_date', 'end_date','duration'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'subscriber_id' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'status' => 'required'
        ]);

            $startDate = Carbon::parse($validatedData['start_date']);
            $duration = $validatedData['duration'];
            $endDate = $startDate->addMonths($duration)->toDateString();
            $validatedData['end_date'] = $endDate;

        Subscription::create($validatedData);
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
