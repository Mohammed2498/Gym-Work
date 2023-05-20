<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Carbon\Carbon;
class HomeController extends Controller
{


    public function index()
    {
        // Retrieve the counts
        $totalSubscribers = Subscriber::count();

        $activeSubscribers =  Subscriber::whereHas('subscription', function ($query) {
            $query->where('status', 'active');
        })->count();

        $expiredSubscribers = Subscriber::whereHas('subscription', function ($query) {
            $query->whereDate('end_date', '<', Carbon::now()->toDateString());
        })->count();
        $notSubscribedSubscribers = Subscriber::doesntHave('subscription')->count();

        // Pass the counts to the view
        return view('admin.home', compact('totalSubscribers', 'activeSubscribers', 'expiredSubscribers', 'notSubscribedSubscribers'));
    }
}
