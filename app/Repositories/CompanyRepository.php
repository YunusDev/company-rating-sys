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

    public function getCompanies(int $numPagination = 9)
    {
        return $this->model->latest()->paginate($numPagination);

    }

    public function rateCompany(Company $company, int $rating)
    {
        $company->ratings()->attach(auth()->id(), ['rating' => $rating]);
        return $company->fresh();
    }


}
