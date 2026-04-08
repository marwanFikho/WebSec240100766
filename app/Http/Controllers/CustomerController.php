<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomerController extends Controller
{
    public function index(): View
    {
        return view('customers.index', [
            'customers' => User::where('role', 'customer')->orderBy('name')->paginate(15),
        ]);
    }

    public function addCredit(Request $request, User $user): RedirectResponse
    {
        if ($user->role !== 'customer') {
            abort(403);
        }

        $validated = $request->validate([
            'amount' => ['required', 'numeric', 'min:0.01'],
        ]);

        $user->increment('credit', $validated['amount']);

        return redirect()->route('customers.index')->with('status', 'Credit added');
    }

    public function account(Request $request): View
    {
        $user = $request->user();

        return view('customers.account', [
            'user' => $user,
            'purchases' => $user->purchases()->with('product')->latest('purchased_at')->get(),
        ]);
    }
}
