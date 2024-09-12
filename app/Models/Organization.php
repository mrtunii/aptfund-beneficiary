<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name', 'description', 'logo', 'impact', 'address', 'verified',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_organization');
    }
}
