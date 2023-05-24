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
        $subscribers = Subscriber::with('subscription')->get();
//        $subscriptions=$subscriber->subscriptions;
//        $subscribers = Subscriber::with('subscriptions')->get();
        return view('admin.subscribers.index', ['subscribers' => $subscribers]);
    }

    public function activeSubscribers()
    {

        $subscribers = Subscriber::with('subscription')->get();

        return view('admin.subscribers.active', ['subscribers' => $subscribers]);
    }

    public function expiredSubscribers()
    {

        $subscribers = Subscriber::with('subscription')->get();


        return view('admin.subscribers.expired', ['subscribers' => $subscribers]);
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
            'phone' => ['required','numeric', 'digits_between:10,10','regex:/^(056|059)\d{7}$/']
        ]);

        $image = $request->file('image');
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image_url = $image->store('subscribers', 'public');
            $data['image'] = $image_url;
        } else {
            $data['image'] = 'subscribers/users-image.jpg';
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
            'phone' => ['required','numeric', 'digits_between:10,10','regex:/^(056|059)\d{7}$/'],
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

        if ($subscriber->image) {
            if ($subscriber->image !== "subscribers/users-image.jpg") {
                Storage::disk('public')->delete($subscriber->image);
            }
        }
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber has been deleted');
    }
}
