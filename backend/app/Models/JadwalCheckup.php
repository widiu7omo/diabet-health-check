<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="JadwalCheckup",
 *      required={"checkup", "tgl_checkup", "lokasi", "catatan"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="checkup",
 *          description="checkup",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="tgl_checkup",
 *          description="tgl_checkup",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="lokasi",
 *          description="lokasi",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="catatan",
 *          description="catatan",
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class JadwalCheckup extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jadwal_checkups';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'checkup',
        'tgl_checkup',
        'lokasi',
        'catatan',
        'dokter_id',
        'pasien_id',
        'pemeriksaan_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    public function getTglCheckupAttribute($value)
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->translatedFormat('l, d-m-Y H:i');

    }

    protected $casts = [
        'id' => 'integer',
        'checkup' => 'string',
        'tgl_checkup' => 'datetime',
        'lokasi' => 'string',
        'dokter_id' => 'integer',
        'pasien_id' => 'integer',
        'pemeriksaan_id' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'checkup' => 'required',
        'tgl_checkup' => 'required',
        'lokasi' => 'required',
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id');
    }

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }
}
