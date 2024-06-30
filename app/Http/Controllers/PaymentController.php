<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Client;
use App\Models\Category;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $payments = Payment::with('client')->paginate(4);

        $payments = Payment::with('client')->orderBy('created_at', 'desc')->paginate(4);

        return view('payments.index', compact('payments'));
    }

    public function new() {
        
        $clients = Client::all();
        $categories = Category::where('type', 'payment')->get();
        return view('payments.new', compact('clients', 'categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'client_id' => 'required|int|max:255',
            'category_id' => 'required|int|max:255',
            'reference' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Payment::create([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'date' => $request->date,
            'amount' => $request->amount,
            'client_id' => $request->client_id,
            'category_id' => $request->category_id,
            'reference' => $request->reference,
            'description' => $request->description,
        ]);
        
        // $payment = Payment::create($request->all());
        
        return redirect()->route('payments')->with('success', 'Payment recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $payment_id)
    {
        $payment = Payment::find($payment_id);
        return view('payments.show', compact('payment'));
    }

    public function edit($payment_id)
    {

        $clients = Client::all();
        $payment = Payment::find($payment_id);
        $categories = Category::where('type', 'payment')->get();

        return view('payments.edit', compact('payment', 'clients', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $payment_id)
    {
        $request->validate([
            'date' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'client_id' => 'required|int|max:255',
            'reference' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $payment = Payment::find($payment_id);

        $payment->update($request->all());

        return redirect()->route('payments')->with('success', 'Payment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $payment_id)
    {
        $payment = Payment::find($payment_id);
        
        $payment->delete();
        
        return redirect()->route('payments')->with('success', 'Payment deleted successfully!');
    }
}
