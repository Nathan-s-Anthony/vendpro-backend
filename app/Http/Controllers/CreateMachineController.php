<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateMachineController extends Controller
{
    public function createMachine(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'model' => 'required|string',
            'serial_number' => 'required|string|unique:machines,serial_number',
            'location_id' => 'required|exists:locations,id',
        ]);
        $user = $request->user();

        $machine = $user->machines()->create($validated);

        return response()->json($machine, 201);
    }
}
