<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="PolaObat",
 *      required={"obat", "jumlah", "anjuran"},
 *      @OA\Property(
 *          property="id",
 *          description="id",

 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="obat",
 *          description="obat",

 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="jumlah",
 *          description="jumlah",

 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="anjuran",
 *          description="anjuran",

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
class PolaObat extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pola_obats';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'obat',
        'jumlah',
        'anjuran',
        'pemeriksaan_id',
        'jadwal_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'obat' => 'string',
        'jumlah' => 'integer',
        'anjuran' => 'string',
        'pemeriksaan_id' => 'integer',
        'jadwal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'obat' => 'required',
        'jumlah' => 'required',
        'anjuran' => 'required'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function jadwal_checkup()
    {
        return $this->belongsTo(JadwalCheckup::class, 'jadwal_id');
    }
}
