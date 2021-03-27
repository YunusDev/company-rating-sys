<?php


namespace App\Repositories;


use App\Contracts\CompanyContract;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class CompanyRepository extends BaseRepository implements CompanyContract
{
    /**
     * CompanyRepository constructor.
     * @param Company $model
     */
    public function __construct(Company $model)
    {
        parent::__construct($model);
        $this->model = $model;

    }

    /**
     * @param int $numPagination
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function getCompanies(int $numPagination = 9, string $orderBy = 'created_at', string $sortBy = 'desc')
    {
        return $this->all($numPagination, $orderBy, $sortBy);

    }

    /**
     * @param Company $company
     * @param int $rating
     * @return Company|mixed
     */
    public function rateCompany(Company $company, int $rating)
    {
        $company->ratings()->attach(auth()->id(), ['rating' => $rating]);
        $company->fresh();
        $company->update(['avg_rating' => $company->averageRating()]);
        return $company;
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function storeCompany(array $params)
    {
        return $this->create($params);
    }

    /**
     * @param array $params
     * @param string $id
     * @return bool|mixed
     */
    public function updateCompany(array $params, string $id)
    {
        return $this->update($params, $id);
    }

    /**
     * @param string $id
     * @return bool|mixed
     */
    public function deleteCompany(string $id)
    {
        return $this->delete($id);
    }


}
