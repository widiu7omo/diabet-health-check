<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use OpenApi\Annotations as OA;
use Spatie\Permission\Traits\HasRoles;

/**
 * @OA\Schema(
 *      schema="User",
 *      required={"name", "email"},
 *      @OA\Property(
 *          property="id",
 *          description="id",

 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="name",
 *          description="name",

 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          description="email",

 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          description="password",

 *          type="string"
 *      )
 * )
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemeriksaans()
    {
        return $this->hasMany(Pemeriksaan::class);
    }

    public function jadwal_checkups()
    {
        return $this->hasMany(JadwalCheckup::class);
    }
}
