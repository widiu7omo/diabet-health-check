<?php

namespace App\Repositories;

use App\Models\Pemeriksaan;
use App\Repositories\BaseRepository;

/**
 * Class PemeriksaanRepository
 * @package App\Repositories
 * @version July 11, 2022, 4:59 pm UTC
*/

class PemeriksaanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pemeriksaan',
        'tgl_periksa',
        'hasil_diagnosa'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pemeriksaan::class;
    }
}
