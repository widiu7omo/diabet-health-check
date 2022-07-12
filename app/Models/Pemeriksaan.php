<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="Pemeriksaan",
 *      required={"pemeriksaan", "tgl_periksa", "detail_pembahasan", "hasil_diagnosa"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="pemeriksaan",
 *          description="pemeriksaan",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="tgl_periksa",
 *          description="tgl_periksa",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string",
 *          format="date"
 *      ),
 *      @OA\Property(
 *          property="detail_pembahasan",
 *          description="detail_pembahasan",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="hasil_diagnosa",
 *          description="hasil_diagnosa",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="created_at",
 *          description="created_at",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string",
 *          format="date-time"
 *      ),
 *      @OA\Property(
 *          property="deleted_at",
 *          description="deleted_at",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Pemeriksaan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pemeriksaans';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pemeriksaan',
        'tgl_periksa',
        'detail_pembahasan',
        'hasil_diagnosa',
        'dokter_id',
        'pasien_id',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pemeriksaan' => 'string',
        'tgl_periksa' => 'date',
        'hasil_diagnosa' => 'string',
        'dokter_id' => 'integer',
        'pasien_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pemeriksaan' => 'required',
        'tgl_periksa' => 'required',
        'detail_pembahasan' => 'required',
        'hasil_diagnosa' => 'required'
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

    public function pasien()
    {
        return $this->belongsTo(User::class, 'pasien_id');
    }

    public function jadwal_checkups()
    {
        return $this->hasMany(JadwalCheckup::class);
    }

    public function pola_makans()
    {
        return $this->hasMany(PolaMakan::class);
    }

    public function pola_obats()
    {
        return $this->hasMany(PolaObat::class);
    }
}
