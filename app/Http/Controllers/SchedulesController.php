<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        return response()->json(['schedules' => $schedules], 200);
    }

    public function show($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        return response()->json(['schedule' => $schedule], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_client' => 'required|integer',
            'id_type_cut' => 'required|integer',
            'id_opening_hours' => 'required|integer',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $schedule = Schedule::create($request->all());

        return response()->json(['schedule' => $schedule], 201);
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_client' => 'required|integer',
            'id_type_cut' => 'required|integer',
            'id_opening_hours' => 'required|integer',
            'appointment_time' => 'required|date_format:H:i:s',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $schedule->update($request->all());

        return response()->json(['schedule' => $schedule], 200);
    }

    public function destroy($id)
    {
        $schedule = Schedule::find($id);

        if (!$schedule) {
            return response()->json(['message' => 'Schedule not found'], 404);
        }

        $schedule->delete();

        return response()->json(['message' => 'Schedule deleted'], 200);
    }
}
