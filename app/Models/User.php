<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements FilamentUser, MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function canAccessFilament(): bool
    {
        return $this->isAdmin() && $this->hasVerifiedEmail();
    }

    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function newsletters(): BelongsToMany
    {
        return $this->belongsToMany(Newsletter::class)->withTimestamps();
    }

    public function hasRole(String $role)
    {
        return $this->roles->contains('slug', $role);
    }

    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    public function isBasic()
    {
        return $this->hasRole('basic');
    }

    public function isIndividual()
    {
        return $this->hasRole('individual');
    }

    public function isSchoolNpo()
    {
        return $this->hasRole('school-npo');
    }

    public function isOrganization()
    {
        return $this->hasRole('organization');
    }

    public function isGroup()
    {
        return $this->isSchoolNpo() || $this->isOrganization();
    }

    public function individual(): HasOne
    {
        return $this->hasOne(Individual::class);
    }

    public function organization(): HasOne
    {
        return $this->hasOne(Organization::class);
    }

    public function participant(): HasOne
    {
        return $this->hasOne(Participant::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
