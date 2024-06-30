<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;
use App\Models\Category;
use App\Models\Vendor;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::with('category')->orderBy('created_at', 'desc')->paginate(4);

        return view('expenses.index', compact('expenses'));
    }

    public function new() {
        
        $vendors = Vendor::all();
        $categories = Category::where('type', 'expense')->get();
        return view('expenses.new', compact('categories', 'vendors'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'vendor_id' => 'required|int|max:255',
            'category_id' => 'required|int|max:255',
            'reference' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        Expense::create([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'date' => $request->date,
            'amount' => $request->amount,
            'vendor_id' => $request->vendor_id,
            'category_id' => $request->category_id,
            'reference' => $request->reference,
            'description' => $request->description,
        ]);
        
        // $expense = Expense::create($request->all());
        
        return redirect()->route('expenses')->with('success', 'Expenses recorded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $expense_id)
    {
        $expense = Expense::find($expense_id);
        return view('expenses.show', compact('expense'));
    }

    public function edit($expense_id)
    {
        $vendors = Vendor::all();
        $expense = Expense::find($expense_id);
        $categories = Category::where('type', 'expense')->get();

        return view('expenses.edit', compact('expense', 'vendors', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $expense_id)
    {
        $request->validate([
            'date' => 'required|string|max:255',
            'amount' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'category_id' => 'required|int|max:255',
            'reference' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $expense = Expense::find($expense_id);

        $expense->update([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'date' => $request->date,
            'amount' => $request->amount,
            'vendor_id' => $request->vendor_id,
            'category_id' => $request->category_id,
            'reference' => $request->reference,
            'description' => $request->description,
        ]);

        // $expense->update($request->all());

        return redirect()->route('expenses')->with('success', 'Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $expense_id)
    {
        $expense = Expense::find($expense_id);
        
        $expense->delete();
        
        return redirect()->route('expenses')->with('success', 'Expense deleted successfully!');
    }
}
