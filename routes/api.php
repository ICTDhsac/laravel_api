<?php

use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



// Route::get('/students', [StudentController::class, 'index']);
// Route::post('/students', [StudentController::class, 'store']);

Route::resource('students', StudentController::class);

// This route is protected by the 'auth:sanctum' middleware, which means that only authenticated users can access it.
// The route simply returns the authenticated user as a JSON response.
// This route is useful for testing that the authentication system is working correctly.
// For example, you can use a tool like Postman or cURL to make a GET request to this route.
// If the request is successful, you should see the authenticated user's details in the response.
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
