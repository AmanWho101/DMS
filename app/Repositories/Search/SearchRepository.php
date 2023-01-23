<?php

namespace App\Repositories\Search;

use App\Models\Search\Search;
use InfyOm\Generator\Common\BaseRepository;

class SearchRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Search::class;
    }
}
