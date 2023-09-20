<?php

namespace App\Http\Controllers;

use App\Models\OpeningHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpeningHourController extends Controller
{
    public function index()
    {
        $openingHours = OpeningHour::all();
        return response()->json(['openingHours' => $openingHours], 200);
    }

    public function show($id)
    {
        $openingHour = OpeningHour::find($id);

        if (!$openingHour) {
            return response()->json(['message' => 'Opening Hour not found'], 404);
        }

        return response()->json(['openingHour' => $openingHour], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_opening_hours' => 'required|integer',
            'opening_time' => 'required|time',
            'closing_time' => 'required|time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $openingHour = OpeningHour::create($request->all());

        return response()->json(['openingHour' => $openingHour], 201);
    }

    public function update(Request $request, $id)
    {
        $openingHour = OpeningHour::find($id);

        if (!$openingHour) {
            return response()->json(['message' => 'Opening Hour not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_opening_hours' => 'required|integer',
            'opening_time' => 'required|time',
            'closing_time' => 'required|time',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $openingHour->update($request->all());

        return response()->json(['openingHour' => $openingHour], 200);
    }

    public function destroy($id)
    {
        $openingHour = OpeningHour::find($id);

        if (!$openingHour) {
            return response()->json(['message' => 'Opening Hour not found'], 404);
        }

        $openingHour->delete();

        return response()->json(['message' => 'Opening Hour deleted'], 200);
    }
}
