<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\BuildRepositoryRepository;
use App\Entities\BuildRepository;
use App\Validators\BuildValidator;
use App\Models\Build;

/**
 * Class BuildRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BuildRepositoryRepositoryEloquent extends BaseRepository implements BuildRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Build::class;
    }

    public function validator()
    {
        return BuildValidator::class;
    }
    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
