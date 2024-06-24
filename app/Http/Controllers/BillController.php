<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bill;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bills = Bill::get();

        return view('bills.index', compact('bills'));
    }

    public function new() {
        return view('bills.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'required|string|max:255',
            'next_due_date' => 'required|string|max:255',
        ]);

        Bill::create([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'name' => $request->name,
            'amount' => $request->amount,
            'type' => $request->type,
            'next_due_date' => $request->next_due_date,
        ]);
        
        // $category = Category::create($request->all());
        
        return redirect()->route('bills')->with('success', 'Bill added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $bill_id)
    {
        $bill = Bill::find($bill_id);
        return view('bills.show', compact('bill'));
    }

    public function edit($bill_id)
    {
      $bill = Bill::find($bill_id);
      return view('bills.edit', compact('bill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $bill_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'type' => 'required|string|max:255',
            'next_due_date' => 'required|string|max:255',
        ]);

        $bill = Bill::find($bill_id);

        $bill->update($request->all());

        return redirect()->route('bills')->with('success', 'Bill updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $bill_id)
    {
        $bill = Bill::find($bill_id);
        
        $bill->delete();
        
        return redirect()->route('bills')->with('success', 'Category deleted successfully!');
    }
}
