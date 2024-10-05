<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Route;

Route::get('organizations', [OrganizationController::class, 'index']);
Route::get('campaigns', [CampaignController::class, 'index']);
Route::get('campaigns/{campaign}', [CampaignController::class, 'show']);
