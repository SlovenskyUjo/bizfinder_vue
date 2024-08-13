<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PanelController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $approvedCompanies = Company::where('approved', 1)->get();
        $unApprovedCompanies = Company::where('approved', 0)->get();
        return Inertia::render('Panel', [
            'unApprovedCompanies' => $unApprovedCompanies,
            'approvedCompanies' => $approvedCompanies,
            'user' => $user
        ]);
    }
}
