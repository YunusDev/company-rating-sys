<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Transformers\CompanyCollection;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private $companyRepository;

    public function __construct(CompanyContract $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function index()
    {
//        $data['companies'] = new CompanyCollection($this->companyRepository->getCompanies());
        $data['companies'] = $this->companyRepository->getCompanies();
//        return $data;

        return view('welcome')->with($data);
    }

    public function getCompanies(Request $request){

        $page = 1;

        if ($request->get('page')){

            $page = 1;

        }

        $companies = $this->companyRepository->getCompanies(9);

        return response()->json($companies);

    }
}
