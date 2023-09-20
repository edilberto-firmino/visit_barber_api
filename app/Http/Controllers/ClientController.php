<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json(['clients' => $clients], 200);
    }

    public function show($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        return response()->json(['client' => $client], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_client' => 'required|integer',
            'name_client' => 'required|string',
            'email_client' => 'required|email',
            'pass_client' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $client = Client::create($request->all());

        return response()->json(['client' => $client], 201);
    }

    public function update(Request $request, $id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_client' => 'required|integer',
            'name_client' => 'required|string',
            'email_client' => 'required|email',
            'pass_client' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $client->update($request->all());

        return response()->json(['client' => $client], 200);
    }

    public function destroy($id)
    {
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['message' => 'Client not found'], 404);
        }

        $client->delete();

        return response()->json(['message' => 'Client deleted'], 200);
    }
}
