<?php
namespace App\Contracts;

use App\Models\Company;

interface CompanyContract{

    public function getCompanies(int $numPagination = 9);

    public function rateCompany(Company $company, int $rating);

}
