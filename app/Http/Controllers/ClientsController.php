<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return api_response(Client::all());
    }
    public function show($id)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Client requisitado não existe.");
        }
        return api_response()->make($client);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $client = Client::create($request->all());
        return api_response()->make($client, 201);
    }
    public function update($id, Request $request)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Client requisitado não existe.");
        }

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required'
        ]);

        $client->fill($request->all());
        $client->save();
        return api_response()->make($client, 200);
    }
    public function destroy($id)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Client requisitado não existe.");
        }
        $client->delete();
        return api_response()->make('', 204);
    }
}
