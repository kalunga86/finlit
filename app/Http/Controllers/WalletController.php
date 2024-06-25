<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Wallet;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallets = Wallet::get();

        return view('wallets.index', compact('wallets'));
    }

    public function new() {
        
        return view('wallets.new');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'date_from' => 'required|string|max:255',
            'date_to' => 'required|string|max:255',
        ]);

        Wallet::create([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);
        
        return redirect()->route('wallets')->with('success', 'Wallet added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $wallet_id)
    {
        $wallet = Wallet::find($wallet_id);
        return view('wallets.show', compact('wallet'));
    }

    public function edit($wallet_id)
    {
        $wallet = Wallet::find($wallet_id);

        return view('wallets.edit', compact('wallet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $wallet_id)
    {
        $request->validate([
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'date_from' => 'required|string|max:255',
            'date_to' => 'required|string|max:255',
        ]);

        $wallet = Expense::find($wallet_id);

        Wallet::update([
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'date_from' => $request->date_from,
            'date_to' => $request->date_to,
        ]);

        return redirect()->route('wallets')->with('success', 'Wallet updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $wallet_id)
    {
        $wallet = Wallet::find($wallet_id);
        
        $wallet->delete();
        
        return redirect()->route('wallets')->with('success', 'Wallet deleted successfully!');
    }
}
