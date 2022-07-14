<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @OA\Schema(
 *      schema="JadwalDokter",
 *      required={"hari", "jam_mulai", "jam_selesai"},
 *      @OA\Property(
 *          property="id",
 *          description="id",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="hari",
 *          description="hari",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="jam_mulai",
 *          description="jam_mulai",
 *          readOnly=$FIELD_READ_ONLY$,
 *          nullable=$FIELD_NULLABLE$,
 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="jam_selesai",
 *          description="jam_selesai",
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
class JadwalDokter extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'jadwal_dokters';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'hari',
        'jam_mulai',
        'jam_selesai',
        'dokter_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'hari' => 'string',
        'jam_mulai' => 'string',
        'jam_selesai' => 'string',
        'dokter_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required'
    ];

    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }

}
