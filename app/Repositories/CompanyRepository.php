<?php


namespace App\Repositories;


use App\Contracts\CompanyContract;
use App\Models\Company;

class CompanyRepository extends BaseRepository implements CompanyContract
{
    public function __construct(Company $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    public function getCompanies($numPagination = 9)
    {
        return $this->model->paginate($numPagination);

    }

}
