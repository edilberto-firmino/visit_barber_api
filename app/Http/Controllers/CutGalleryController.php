<?php

namespace App\Http\Controllers;

use App\Models\CutGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CutGalleryController extends Controller
{
    public function index()
    {
        $cutGalleries = CutGallery::all();
        return response()->json(['cutGalleries' => $cutGalleries], 200);
    }

    public function show($id)
    {
        $cutGallery = CutGallery::find($id);

        if (!$cutGallery) {
            return response()->json(['message' => 'Cut Gallery not found'], 404);
        }

        return response()->json(['cutGallery' => $cutGallery], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_cut' => 'required|integer',
            'title_cuts' => 'required|string',
            'path_image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cutGallery = CutGallery::create($request->all());

        return response()->json(['cutGallery' => $cutGallery], 201);
    }

    public function update(Request $request, $id)
    {
        $cutGallery = CutGallery::find($id);

        if (!$cutGallery) {
            return response()->json(['message' => 'Cut Gallery not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_cut' => 'required|integer',
            'title_cuts' => 'required|string',
            'path_image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $cutGallery->update($request->all());

        return response()->json(['cutGallery' => $cutGallery], 200);
    }

    public function destroy($id)
    {
        $cutGallery = CutGallery::find($id);

        if (!$cutGallery) {
            return response()->json(['message' => 'Cut Gallery not found'], 404);
        }

        $cutGallery->delete();

        return response()->json(['message' => 'Cut Gallery deleted'], 200);
    }
}
