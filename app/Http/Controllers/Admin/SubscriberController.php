<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $subscriber=new Subscriber();
        $subscribers = Subscriber::with('subscriptions')->get();
//        $subscriptions=$subscriber->subscriptions;
//        $subscribers = Subscriber::with('subscriptions')->get();
        return view('admin.subscribers.index', ['subscribers' => $subscribers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subscriber = new Subscriber();
        return view('admin.subscribers.create', compact('subscriber'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('subscribers', 'public');
            $data['image'] = $image_url;
        }
        $subscriber = Subscriber::create($data);
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber has been added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscriber)
    {
        return view('admin.subscribers.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscriber)
    {
        return view('admin.subscribers.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('subscribers', 'public');
            $data['image'] = $image_url;
        }
        $subscriber->update($data);
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber has been deleted');
    }
}
