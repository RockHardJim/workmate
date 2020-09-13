<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Company\CreateCompanyRequest;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Show the welcome screen.
     *
     * @return Response
     */
    public function welcome()
    {
        return view('company.welcome');
    }

    /**
     * Show the join a new company screen.
     *
     * @return Response
     */
    public function join()
    {
        return view('company.join');
    }

    /**
     * Show the onboarding screen.
     *
     * @return Response
     */
    public function onboard()
    {
        return view('company.onboard');
    }

    /**
     * Create new company.
     *
     * @return Response
     */
    public function create(CreateCompanyRequest $request)
    {
        $request->persist();

        return redirect()->route('home');
    }
}
