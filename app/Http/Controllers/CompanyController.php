<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Http\Requests\CompanyRateRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    //

    private $companyRepository;

    public function __construct(CompanyContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies(Request $request){


        if ($request->get('page')){

            $page = 1;

        }

        $companies = $this->companyRepository->getCompanies(9);

        return response()->json($companies);

    }

    public function rateCompany(CompanyRateRequest $request, Company $company){

        return response()->json([

            'company' => $this->companyRepository->rateCompany($company, $request['rating'])

        ]);

    }
}


