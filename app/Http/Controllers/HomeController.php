<?php

namespace App\Http\Controllers;

use App\Contracts\CompanyContract;
use App\Transformers\CompanyCollection;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

}
