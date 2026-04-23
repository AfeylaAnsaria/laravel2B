<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // READ
    public function index()
    {
        return response()->json(User::all());
    }

    // CREATE
    public function store(Request $request)
    {
        $user = User::create($request->all());
        return response()->json([
            "message" => "User berhasil ditambahkan",
            "data" => $user
        ]);
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return response()->json([
            "message" => "User berhasil diupdate",
            "data" => $user
        ]);
    }

    // DELETE
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json([
            "message" => "User berhasil dihapus"
        ]);
    }
}