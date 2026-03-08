<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProdutoRepositoryRepository;
use App\Entities\ProdutoRepository;
use App\Validators\ProdutoValidator;
use App\Models\Produto;

/**
 * Class ProdutoRepositoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProdutoRepositoryRepositoryEloquent extends BaseRepository implements ProdutoRepositoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }

    public function validator()
    {
        return ProdutoValidator::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
