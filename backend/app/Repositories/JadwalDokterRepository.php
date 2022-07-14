<?php

namespace App\Repositories;

use App\Models\JadwalDokter;
use App\Repositories\BaseRepository;

/**
 * Class JadwalDokterRepository
 * @package App\Repositories
 * @version July 14, 2022, 2:09 pm UTC
*/

class JadwalDokterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'hari',
        'jam_mulai'
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
        return JadwalDokter::class;
    }
}
