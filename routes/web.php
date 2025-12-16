<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\LandingPage;

Route::get('/', LandingPage::class);

// Health check endpoint untuk Docker
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toIso8601String(),
    ]);
});
