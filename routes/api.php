<?php

use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::get('/organizations', [OrganizationController::class, 'index']);
