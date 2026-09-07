<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateMachineController;
use App\Models\AvailableMachine;
use App\Models\Machine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Company;

// Route::post('/login', function (Request $request) {
//     $user = User::where('email', $request->email)->first();
//     $token = $user->createToken("new-token");
//     // $token = $request->user()->createToken($request->token_name);
//     return ['token' => $token->plainTextToken];
// });

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::get('/delete-token', function (Request $request) {
//     $user = User::where('email', $request->email)->first();
//     return $user->tokens()->delete();
// })->middleware('auth:sanctum');
// Public routes
// Route::post('/login', [AuthController::class, 'login']);

// Protected stateless routes
Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/user/machines', function (Machine $machine) {
        return response()->json([
            'data' => $machine,
        ]);
    });
    Route::get('/getAvailableMachines', function () {
        $availableMachines = AvailableMachine::all();
        $availableMachines->transform(function ($machine) {
            $imagePath = (string) $machine->image;
            if ($machine->image) {
                $machine->image = [
                    'data' => base64_encode(
                        Storage::disk('public')->get($imagePath)
                    ),
                    'type' => Storage::disk('public')->mimeType($machine->image),
                ];
            }

            return $machine;
        });
        return response()->json([
            'data' => $availableMachines,
        ]);
    });
    Route::get('/user/getMachines', function (Request $request) {
        $machines = Machine::where('user_id', $request->user()->id)->get();
        $machines->transform(function ($machine) {
            if ($machine->image) {
                $imagePath = (string) $machine->image;
                $machine->image = [
                    'data' => base64_encode(
                        Storage::disk('public')->get($imagePath)
                    ),
                    'type' => Storage::disk('public')->mimeType($imagePath),
                ];
            }

            return $machine;
        });

        return response()->json([
            'data' => $machines,
        ]);
    });
    Route::get('/user/auth/check', function (Request $request) {
        return response()->json([
            'authenticated' => $request->user() !== null,
        ]);
    });
    Route::get('/companies/{company}/seo', function (Company $company) {
        return response()->json([
            'data' => $company->seo,
        ]);
    });


    Route::post('/createMachine', [CreateMachineController::class, 'createMachine']);

    Route::post('/logout', [AuthController::class, 'logout']);

});