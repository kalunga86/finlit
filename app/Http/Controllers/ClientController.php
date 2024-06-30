<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Client::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone_number', 'like', "%{$search}%")
                  ->orWhere('created_at', 'like', "%{$search}%"); // Adjust if date format needs to be specific
        }
        
        $clients = $query->paginate(10);

        return view('clients.index', compact('clients'));
    }

    public function new() {
        return view('clients.new');
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

        Client::create([
            'user_id' => Auth::id(), // Associate the client with the authenticated user
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ]);
        
        // $client = Client::create($request->all());
        
        return redirect()->route('clients')->with('success', 'Client added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $client_id)
    {
        $client = Client::find($client_id);
        return view('clients.show', compact('client'));
    }

    public function edit($client_id)
    {
      $client = Client::find($client_id);
      return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $client_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'phone_number' => 'required|string|max:255',
        ]);

        $client = Client::find($client_id);

        $client->update($request->all());

        return redirect()->route('clients')->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $client_id)
    {
        $client = Client::find($client_id);
        
        $client->delete();
        
        return redirect()->route('clients')->with('success', 'Client deleted successfully!');
    }
}
