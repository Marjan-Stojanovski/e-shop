<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShippingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function storeProfileDetails(Request $request)
    {
        $user = Auth::user()->id;

        Shipping::create([
            'company' => $request->get('company'),
            'taxNumber' => $request->get('taxNumber'),
            'firstName' => $request->get('firstName'),
            'lastName' => $request->get('lastName'),
            'phoneNumber' => $request->get('phoneNumber'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'country_id' => $request->get('country_id'),
            'city' => $request->get('city'),
            'zipcode' => $request->get('zipcode'),
            'user_id' => $user,
        ]);

        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();
        $userDetails = Shipping::where('user_id', $user)->first();

        $data = [
            'company' => $company,
            'categoriesTree' => $categoriesTree,
            'brands' => $brands,
            'userDetails' => $userDetails
        ];

        return view('frontend.users.userProfile')->with($data);
    }
}
