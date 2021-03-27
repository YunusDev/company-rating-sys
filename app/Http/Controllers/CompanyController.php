<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Http\Requests\CompanyRateRequest;
use App\Models\Company;
use App\Transformers\CompanyCollection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class CompanyController extends Controller
{
    //

    private $companyRepository;

    public function __construct(CompanyContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies(Request $request){


        if ($request->get('orderBy') && $request->get('sortBy')){

            $companies = $this->companyRepository->getCompanies(9,
                $request->get('orderBy'), $request->get('sortBy')
            );

        }else{

            $companies = $this->companyRepository->getCompanies(9);

        }
        return response()->json($companies);

    }

    public function rateCompany(CompanyRateRequest $request, Company $company){

        return response()->json([

            'company' => $this->companyRepository->rateCompany($company, $request['rating'])

        ]);

    }


    public function getApiCompanies(){

        $companies = $this->companyRepository->getCompanies(9);

        return response()->json([

            'success' => true,
            'message' => 'Companies fetched successfully',
            'data' => new CompanyCollection($companies)

        ]);



    }
}


