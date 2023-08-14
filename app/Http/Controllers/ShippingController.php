<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\ShoppingCart;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use PHPUnit\Framework\Constraint\Count;

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

        return view('frontend.user.userProfile')->with($data);
    }


    public
    function updateDetails(Request $request, $id)
    {
        $company = CompanyInfo::first();
        $employees = Employee::all();
        $user = Auth::user()->id;
        $loggedUser = Auth::user();
        $categoriesTree = Category::getTreeHP();
        $shoppingLists = ShoppingCart::where('user_id', $user)->get();
        $shoppingListsCount = count($shoppingLists);
        $userLists = ShoppingCart::groupBy('name', 'price', 'quantity')
            ->selectRaw('count(*) as total, name, price, quantity')
            ->get();
        $totalAmount = null;


        $data = [
            'company' => $company,
            'employees' => $employees,
            'loggedUser' => $loggedUser,
            'categoriesTree' => $categoriesTree,
            'shoppingLists' => $shoppingLists,
            'shoppingListsCount' => $shoppingListsCount,
            'userLists' => $userLists,
            'totalAmount' => $totalAmount,
            'details' => $details
        ];

        return view('frontend.userInfo')->with($data);
    }

    public
    function viewMessage($id)
    {

        $message = Message::FindorFail($id);
        $company = CompanyInfo::first();
        $employees = Employee::all();
        $loggedUser = Auth::user();
        $categoriesTree = Category::getTreeHP();
        $totalAmount = null;
        $dateOld = $message->created_at;
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $dateOld)->format('d-M-Y');

        $data = [
            'company' => $company,
            'employees' => $employees,
            'date' => $date,
            'loggedUser' => $loggedUser,
            'categoriesTree' => $categoriesTree,
            'message' => $message,
            'totalAmount' => $totalAmount
        ];

        return view('frontend.userMessages')->with($data);
    }
}
