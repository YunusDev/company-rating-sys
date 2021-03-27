<?php
namespace App\Contracts;

use App\Models\Company;

interface CompanyContract{

    /**
     * @param int $numPagination
     * @param string $orderBy
     * @param string $sortBy
     * @return mixed
     */
    public function getCompanies(int $numPagination = 9, string $orderBy = 'created_at', string $sortBy = 'desc');

    /**
     * @param Company $company
     * @param int $rating
     * @return mixed
     */
    public function rateCompany(Company $company, int $rating);

    /**
     * @param array $params
     * @return mixed
     */
    public function storeCompany(array $params);

    /**
     * @param array $params
     * @param string $id
     * @return mixed
     */
    public function updateCompany(array $params, string $id);
//

    /**
     * @param string $id
     * @return mixed
     */
    public function deleteCompany(string $id);

}
