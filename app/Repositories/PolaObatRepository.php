<?php

namespace App\Repositories;

use App\Models\PolaObat;
use App\Repositories\BaseRepository;

/**
 * Class PolaObatRepository
 * @package App\Repositories
 * @version July 11, 2022, 5:00 pm UTC
*/

class PolaObatRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'obat',
        'jumlah'
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
        return PolaObat::class;
    }
}
