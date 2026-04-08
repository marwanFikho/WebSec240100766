<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PurchaseController extends Controller
{
    public function index(): View
    {
        return view('store.index', [
            'products' => Product::where('stock_quantity', '>', 0)->orderBy('name')->paginate(10),
        ]);
    }

    public function store(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $quantity = $validated['quantity'];
        $currentUser = $request->user();

        $errorMessage = null;

        DB::transaction(function () use ($currentUser, $product, $quantity, &$errorMessage): void {
            $user = User::whereKey($currentUser->id)->lockForUpdate()->firstOrFail();
            $lockedProduct = Product::whereKey($product->id)->lockForUpdate()->firstOrFail();
            $total = $lockedProduct->price * $quantity;

            if ($lockedProduct->stock_quantity < $quantity) {
                $errorMessage = 'Not enough stock';

                return;
            }

            if ($user->credit < $total) {
                $errorMessage = 'Insufficient Credit';

                return;
            }

            $lockedProduct->decrement('stock_quantity', $quantity);
            $user->decrement('credit', $total);

            Purchase::create([
                'user_id' => $user->id,
                'product_id' => $lockedProduct->id,
                'quantity' => $quantity,
                'unit_price' => $lockedProduct->price,
                'total_price' => $total,
                'purchased_at' => now(),
            ]);
        });

        if ($errorMessage !== null) {
            return back()->withErrors(['purchase' => $errorMessage]);
        }

        return redirect()->route('store.index')->with('status', 'Purchase successful');
    }
}
