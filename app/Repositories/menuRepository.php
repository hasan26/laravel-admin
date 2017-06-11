<?php

namespace App\Repositories;

use App\Models\menu;
use InfyOm\Generator\Common\BaseRepository;

class menuRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'type',
        'detail',
        'img',
        'long_detail'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return menu::class;
    }
}
