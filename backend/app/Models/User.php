<?php

namespace App\Models;

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
        'phone',
        'token_fcm', 'email_kerabat', 'tempat_lahir', 'tanggal_lahir', 'alamat'
    ];

    /**
     * Specifies the user's FCM token
     *
     * @return string|array
     */
    public function routeNotificationForFcm()
    {
        return $this->token_fcm;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'token_fcm'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pemeriksaan_dokters()
    {
        return $this->hasMany(Pemeriksaan::class, 'dokter_id');
    }

    public function pemeriksaan_pasiens()
    {
        return $this->hasMany(Pemeriksaan::class, 'pasien_id');
    }

    public function jadwal_checkup_dokters()
    {
        return $this->hasMany(JadwalCheckup::class, 'dokter_id');
    }

    public function jadwal_checkup_pasiens()
    {
        return $this->hasMany(JadwalCheckup::class, 'pasien_id');
    }

    public function jadwal_dokters()
    {
        return $this->hasMany(JadwalDokter::class, 'dokter_id');
    }
}
