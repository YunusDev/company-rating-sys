<?php

namespace App\Http\Controllers\Admin;

use App\Contracts\CompanyContract;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //
    private $companyRepository;

    public function __construct(CompanyContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index(){

        return view('admin.company.index');

    }


    public function store(StoreCompanyRequest $request){

        try {

            $params = $request->all();
            return $this->companyRepository->storeCompany($params);

        }catch (\Throwable $exception){

            throw $exception;

        }

    }

    public function update(StoreCompanyRequest $request, Company $company){

        try {

            $params = $request->all();
            $this->companyRepository->updateCompany($params, $company->id);
            return $company->fresh();


        }catch (\Throwable $exception){

            throw $exception;

        }

    }

    public function destroy(Request $request, $id){

        try {

            return $this->companyRepository->deleteCompany($id);

        }catch (\Throwable $exception){

            throw $exception;

        }

    }
}
