<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::where('approved', 1)->get();
        return Inertia::render('Company/Companies', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:1|max:244',
            'description' => 'required|min:1|max:244',
            'place' => 'required|min:3|max:244',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'type' => 'required|min:1|max:244'
        ]);

        $path = $request->file('image')->store('public/images');
        $fileName = basename($path);

        $imageUrl = 'storage/images/' . $fileName;

        $company = Company::create([
            'name' => $request->name,
            'description' => $request->description,
            'place' => $request->place,
            'image' => $imageUrl,
            'type' => $request->type,
            'approved' => 0
        ]);

        return redirect(route('welcome'));
    }

    public function approve($id)
    {
        $company = Company::findOrFail($id);
        $company->update(['approved' => 1]);

        return redirect(route('company.index'));
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete($id);

        return redirect(route('company.index'));
    }
}
