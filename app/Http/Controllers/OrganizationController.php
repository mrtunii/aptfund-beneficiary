<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrganizationAPIResource;
use App\Models\Organization;

class OrganizationController extends Controller
{
    public function index()
    {
        return $this->ok(OrganizationAPIResource::collection(Organization::whereVerified(true)->latest()->get()));
    }
}
