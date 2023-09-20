<?php

namespace App\Http\Controllers;

use App\Models\ProfilePicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfilePictureController extends Controller
{
    public function index()
    {
        $profilePictures = ProfilePicture::all();
        return response()->json(['profilePictures' => $profilePictures], 200);
    }

    public function show($id)
    {
        $profilePicture = ProfilePicture::find($id);

        if (!$profilePicture) {
            return response()->json(['message' => 'Profile Picture not found'], 404);
        }

        return response()->json(['profilePicture' => $profilePicture], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_user' => 'required|integer',
            'name_image' => 'required|string',
            'path_image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $profilePicture = ProfilePicture::create($request->all());

        return response()->json(['profilePicture' => $profilePicture], 201);
    }

    public function update(Request $request, $id)
    {
        $profilePicture = ProfilePicture::find($id);

        if (!$profilePicture) {
            return response()->json(['message' => 'Profile Picture not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'id_barber' => 'required|integer',
            'id_user' => 'required|integer',
            'name_image' => 'required|string',
            'path_image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $profilePicture->update($request->all());

        return response()->json(['profilePicture' => $profilePicture], 200);
    }

    public function destroy($id)
    {
        $profilePicture = ProfilePicture::find($id);

        if (!$profilePicture) {
            return response()->json(['message' => 'Profile Picture not found'], 404);
        }

        $profilePicture->delete();

        return response()->json(['message' => 'Profile Picture deleted'], 200);
    }
}
