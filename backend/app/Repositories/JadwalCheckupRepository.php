<?php

namespace App\Repositories;

use App\Models\JadwalCheckup;
use App\Repositories\BaseRepository;

/**
 * Class JadwalCheckupRepository
 * @package App\Repositories
 * @version July 11, 2022, 4:59 pm UTC
*/

class JadwalCheckupRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'checkup',
        'tgl_checkup',
        'catatan'
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
        return JadwalCheckup::class;
    }
}
