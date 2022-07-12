<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *      schema="PolaMakan",
 *      required={"category", "dilarang", "dianjurkan"},
 *      @OA\Property(
 *          property="id",
 *          description="id",


 *          type="integer",
 *          format="int32"
 *      ),
 *      @OA\Property(
 *          property="category",
 *          description="category",


 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="dilarang",
 *          description="dilarang",


 *          type="string"
 *      ),
 *      @OA\Property(
 *          property="dianjurkan",
 *          description="dianjurkan",


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
class PolaMakan extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'pola_makans';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'category',
        'dilarang',
        'dianjurkan',
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
        'category' => 'string',
        'pemeriksaan_id' => 'integer',
        'jadwal_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category' => 'required',
        'dilarang' => 'required',
        'dianjurkan' => 'required'
    ];

    public function pemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class);
    }

    public function jadwal_checkup()
    {
        return $this->belongsTo(JadwalCheckup::class,'jadwal_id');
    }
}
