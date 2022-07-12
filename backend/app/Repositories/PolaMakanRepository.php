<?php

namespace App\Repositories;

use App\Models\PolaMakan;
use App\Repositories\BaseRepository;

/**
 * Class PolaMakanRepository
 * @package App\Repositories
 * @version July 11, 2022, 5:00 pm UTC
 */
class PolaMakanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'category',
        'dilarang',
        'dianjurkan',
        'jadwal_id',
        'pemeriksaan_id'
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
        return PolaMakan::class;
    }
}
