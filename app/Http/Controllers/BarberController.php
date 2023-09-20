<?php

namespace App\Http\Controllers;

use App\Models\Barber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarberController extends Controller
{
    public function index()
    {
        $barbers = Barber::all();
        return response()->json(['barbers' => $barbers], 200);
    }

    public function show($id)
    {
        $barber = Barber::find($id);

        if (!$barber) {
            return response()->json(['message' => 'Barber not found'], 404);
        }

        return response()->json(['barber' => $barber], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'barber_id' => 'required|integer',
            'name_barber' => 'required|string',
            'cpf_barber' => 'required|string',
            'cnpj_barber' => 'required|string',
            'number_cell_barber' => 'required|string',
            'email_barber' => 'required|email|unique:barbers',
            'pass_barber' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $barber = Barber::create($request->all());

        return response()->json(['barber' => $barber], 201);
    }

    public function update(Request $request, $id)
    {
        $barber = Barber::find($id);

        if (!$barber) {
            return response()->json(['message' => 'Barber not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'barber_id' => 'required|integer',
            'name_barber' => 'required|string',
            'cpf_barber' => 'required|string',
            'cnpj_barber' => 'required|string',
            'number_cell_barber' => 'required|string',
            'email_barber' => 'required|email|unique:barbers,email,'.$barber->id,
            'pass_barber' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $barber->update($request->all());

        return response()->json(['barber' => $barber], 200);
    }

    public function destroy($id)
    {
        $barber = Barber::find($id);

        if (!$barber) {
            return response()->json(['message' => 'Barber not found'], 404);
        }

        $barber->delete();

        return response()->json(['message' => 'Barber deleted'], 200);
    }
}
