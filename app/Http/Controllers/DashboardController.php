<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Queue;
use App\Models\Store;
use App\Models\Customer;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $customers = Customer::all()->count();
        $monthly = Queue::whereDate('created_at', '>', now()->subDays(30))->distinct()->pluck('car_id')->count();
        $fresh = Customer::whereDate('created_at', '>', now()->subDays(30))->count();
        $new = Customer::whereDate('created_at', '>', now()->subDays(60))->pluck('id')->toArray();
        $stale = Queue::whereDate('created_at', '<', now()->subDays(60))->whereNotIn('customer_id', $new)->count();

        return Inertia::render('Private/Dashboard/Index', [
            'customers' => $customers,
            'monthly' => $monthly,
            'fresh' => $fresh,
            'stale' => $stale,
            'stores' => Store::all(),
            'roles' => Role::all(),
            'healths' => Auth::user()->healths,
        ]);
    }

    public function monthly() {
        $queues = Queue::where('created_at', '>', now()->subDays(30))->with('car')->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Monthly', [
            'queues' => $queues
        ]);
    }

    public function fresh() {
        $customers = Customer::whereDate('created_at', '>', now()->subDays(30))->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Fresh', [
            'customers' => $customers
        ]);
    }

    public function stale() {
        $new = Customer::whereDate('created_at', '>', now()->subDays(60))->pluck('id')->toArray();
        $stale = Queue::whereDate('created_at', '<', now()->subDays(60))->whereNotIn('customer_id', $new)->pluck('id')->toArray();
        $customers = Customer::whereIn('id', $stale)->paginate(10)->withQueryString();

        return Inertia::render('Private/Dashboard/Stale', [
            'customers' => $customers
        ]);
    }
}
