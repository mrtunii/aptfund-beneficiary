<?php

namespace App\Http\Controllers;

use App\Http\Resources\CampaignAPIResource;
use App\Http\Resources\CampaignDetailAPIResource;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::whereIsPublic(true)->with('organization')->latest()->get();
        return $this->ok(CampaignAPIResource::collection($campaigns));
    }

    public function show(Campaign $campaign)
    {
        $campaign->load(['organization', 'organizations']);
        return $this->ok(new CampaignDetailAPIResource($campaign));
    }
}
