<?php

namespace App\Repositories;

use App\Models\Motivasi;
use App\Repositories\BaseRepository;

/**
 * Class MotivasiRepository
 * @package App\Repositories
 * @version July 13, 2022, 9:17 am UTC
*/

class MotivasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'content'
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
        return Motivasi::class;
    }
}
