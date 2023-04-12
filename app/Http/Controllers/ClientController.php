<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index', [
            'clients' => $clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'personal_id' => 'required|size:11',
        ],
        [
            'name.min' => 'Prailginti vardą iki 3 raidžių',
            'surname.min' => 'Prailginti pavardę iki 3 raidžių',
            'personal_id.size' => 'Asmens kodas turi būti 11 simbolių',
        ]);

        // $validator->after(function (V $validator) {
        //     $validator->errors()->add('Fancy', 'Fancy is wrong!');
        // });

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        $client = new Client;
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->personal_id = $request->personal_id;
        $client->account_no = 'LT' . rand(10, 99) . ' 7300 0' . rand(100, 999) . ' ' . rand(1000, 9999) . ' ' . rand(1000, 9999);
        $client->funds = 0;
        $client->save();
        return redirect()
        ->route('clients.index')
        ->with('ok', 'New client was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', [
            'client' => $client,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', [
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'surname' => 'required|min:3',
            'personal_id' => 'required|size:11',
        ],
        [
            'name.min' => 'Prailginti vardą iki 3 raidžių',
            'surname.min' => 'Prailginti pavardę iki 3 raidžių',
            'personal_id.size' => 'Asmens kodas turi būti 11 simbolių',
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }
        
        $client->name = $request->name;
        $client->surname = $request->surname;
        $client->personal_id = $request->personal_id;
        $client->save();
        return redirect()
        ->route('clients.index')
        ->with('ok', 'The client was updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        if($client->funds != 0){
            return redirect()
            ->back()
            ->withErrors('Client has funds');
        }
        $client->delete();
        return redirect()
        ->route('clients.index')
        ->with('info', 'The client is dead');
    }

    public function addFunds(Client $client)
    {
        return view('clients.addFunds', [
            'client' => $client,
        ]);
    }

    public function removeFunds(Client $client)
    {
        return view('clients.removeFunds', [
            'client' => $client,
        ]);
    }

    public function addStoreFunds(Request $request, Client $client)
    { 
        if($request->funds < 0){
            return redirect()
            ->back()
            ->withErrors('Added funds can\'t be negative.');
        }
        $client->funds += $request->funds;
        $client->save();
        return redirect()
        ->route('clients.show', $client)
        ->with('ok', 'The client was updated');
    }

    public function removeStoreFunds(Request $request, Client $client)
    {
        if($client->funds >= $request->funds)
        {
            if($request->funds < 0){
                return redirect()
                ->back()
                ->withErrors('Removed funds can\'t be negative.');
            }
            $client->funds -= $request->funds;
        } else {
            return redirect()
                ->back()
                ->withErrors('Not enough funds');
        }
        $client->save();
        return redirect()
        ->route('clients.show', $client)
        ->with('ok', 'The client was updated');
    }
}
