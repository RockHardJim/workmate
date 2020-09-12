<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Show the onboarding screen.
     *
     * @return Response
     */
    public function onboard()
    {
        return view('company.onboard');
    }
}
