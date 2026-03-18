<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BuildCompRepository;
use App\Entities\BuildComp;
use App\Validators\BuildCompValidator;

/**
 * Class BuildCompRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BuildCompRepositoryEloquent extends BaseRepository implements BuildCompRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return BuildComp::class;
    }

    public function validator()
    {
        return BuildCompValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
