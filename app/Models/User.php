<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'id_number',
        'date_of_birth',
        'gender_id',
        'language_id',
        'province_id',
        'race_id',
        'email',
        'phone',
        'phone_verification_code',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
            'id_number' => 'hashed',
        ];
    }

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }


    public function interests()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function race()
    {
        return $this->belongsTo(Race::class);
    }
}
