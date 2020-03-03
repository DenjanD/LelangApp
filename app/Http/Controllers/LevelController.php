<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Level;

class LevelController extends Controller
{
    //
    public function read() {
        $data = Level::all();

        return response()->json($data, 200);
    }

    public function add(Request $request) {
        $this->validate($request, [
            'level' => 'required'
        ]);

        $newLevel = new Level([
            'level' => $request->input('level')
        ]);

        if ($newLevel->save()) {
            return response()->json(['msg' => 'New level has been added'], 200);
        }
        return response()->json(['msg' => 'Error during adding level'], 404);
    }
}