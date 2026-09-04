<?php

use App\Http\Controllers\AuthController;
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

    Route::get('/companies/{company}/seo', function (Company $company) {
        return response()->json([
            'data' => $company->seo,
        ]);
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});