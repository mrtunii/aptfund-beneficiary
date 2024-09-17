<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Organization extends Model implements HasAvatar
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'name', 'description', 'logo', 'impact', 'address', 'verified',
    ];

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_organization');
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return Storage::disk('public')->url($this->logo);
    }

    public function campaigns(): HasMany
    {
        return $this->hasMany(Campaign::class);
    }
}
