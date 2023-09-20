<?php

namespace App\Http\Controllers;

use App\Models\CutsType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutsTypeController extends Controller
{
    public function index()
    {
        $cutsTypes = CutsType::all();
        return response()->json(['cutsTypes' => $cutsTypes], 200);
    }

    public function show($id)
    {
        $cutsType = CutsType::find($id);

        if (!$cutsType) {
            return response()->json(['message' => 'Cuts Type not found'], 404);
        }

        return response()->json(['cutsType' => $cutsType], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_type_cut' => 'required|integer',
            'title_cuts' => 'required|string',
            'value_cut' => 'required|integer',
            'time_cut' => 'required|time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cutsType = CutsType::create($request->all());

        return response()->json(['cutsType' => $cutsType], 201);
    }

    public function update(Request $request, $id)
    {
        $cutsType = CutsType::find($id);

        if (!$cutsType) {
            return response()->json(['message' => 'Cuts Type not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_type_cut' => 'required|integer',
            'title_cuts' => 'required|string',
            'value_cut' => 'required|integer',
            'time_cut' => 'required|time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cutsType->update($request->all());

        return response()->json(['cutsType' => $cutsType], 200);
    }

    public function destroy($id)
    {
        $cutsType = CutsType::find($id);

        if (!$cutsType) {
            return response()->json(['message' => 'Cuts Type not found'], 404);
        }

        $cutsType->delete();

        return response()->json(['message' => 'Cuts Type deleted'], 200);
    }
}
