<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vendor::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%")
                  ->orWhere('created_at', 'like', "%{$search}%"); // Adjust if date format needs to be specific
        }
    
        $vendors = $query->paginate(10);

        return view('vendors.index', compact('vendors'));
    }

    public function new() {
        return view('vendors.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:255',
        ]);

        Vendor::create([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
        
        // $client = Client::create($request->all());
        
        return redirect()->route('vendors')->with('success', 'Vendor added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $vendor_id)
    {
        $vendor = Vendor::find($vendor_id);
        return view('vendors.show', compact('vendor'));
    }

    public function edit($vendor_id)
    {
      $vendor = Vendor::find($vendor_id);
      return view('vendors.edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $vendor_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:255',
        ]);

        $vendor = Vendor::find($vendor_id);

        $vendor->update($request->all());

        return redirect()->route('vendors')->with('success', 'vendor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $vendor_id)
    {
        $vendor = Vendor::find($vendor_id);
        
        $vendor->delete();
        
        return redirect()->route('vendors')->with('success', 'Vendor deleted successfully!');
    }
}
