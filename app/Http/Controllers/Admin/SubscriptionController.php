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
        $duration = 1; // Default duration of 1 month
        $subscriber = Subscriber::findOrFail($subscriber_id);
        $start_date = Carbon::now()->toDateString();
        $end_date = Carbon::now()->addMonths($duration)->toDateString();
        return view('admin.subscriptions.create', compact('subscriber_id', 'subscriber', 'start_date', 'end_date', 'duration'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'subscription_type' => 'required|in:specified,custom',
            'subscriber_id' => 'required',
            'duration' => 'nullable|integer|min:1',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
        ]);

        $subscriptionType = $request->subscription_type;
        $subscriberId = $request->subscriber_id;
        $status = 'active';

        if ($subscriptionType === 'specified') {
            $duration = $request->duration;
            $startDate = Carbon::now();
            $endDate = $startDate->copy()->addMonths($duration);

            $subscriptionData = [
                'subscriber_id' => $subscriberId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => $status,
            ];
        } elseif ($subscriptionType === 'custom') {
            $startDate = Carbon::createFromFormat('Y-m-d', $request->start_date);
            $endDate = Carbon::createFromFormat('Y-m-d', $request->end_date);

            $subscriptionData = [
                'subscriber_id' => $subscriberId,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => $status,
            ];
        }

        Subscription::create($subscriptionData);

//        $startDate = Carbon::parse($data['start_date']);
//        $duration = $data['duration'];
//        $endDate = $startDate->addMonths($duration)->toDateString();
//        $data['end_date'] = $endDate;


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
    public function edit($subscriber_id)
    {
        $duration = 1; // Default duration of 1 month
        $subscriber = Subscriber::findOrFail($subscriber_id);
        $start_date = Carbon::now()->toDateString();
        $end_date = Carbon::now()->addMonths($duration)->toDateString();
        return view('admin.subscriptions.edit', compact('subscriber_id', 'subscriber', 'start_date', 'end_date', 'duration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscription $subscription)
    {

        $data = $request->validate([
            'subscriber_id' => 'required',
            'start_date' => 'required|date',
            'duration' => 'required|integer|min:1',
            'status' => 'required|in:active,expired',
            'subscription_type' => 'required',
        ]);


        $startDate = Carbon::parse($data['start_date']);
        $duration = $data['duration'];
        $endDate = $startDate->addMonths($duration)->toDateString();
        $data['end_date'] = $endDate;

        $subscription->update($data);

        // Redirect or return a response
        return redirect()->route('admin.subscribers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete the subscription
        $subscription = Subscription::findOrFail($id);
        $subscription->delete();
        // Redirect back to the subscribers index or any other appropriate page
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscription deleted successfully');
    }
}
