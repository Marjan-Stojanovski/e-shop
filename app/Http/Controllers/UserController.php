<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\Order;
use App\Models\Role;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.index');
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        $countries = Country::all();
        $data = ['users' => $users, 'roles' => $roles, 'countries' => $countries];
        return view('dashboard.users.index')->with($data);
    }

    public function create()
    {
        $roles = Role::all();
        $countries = Country::all();
        $data = ['roles' => $roles, 'countries' => $countries];

        return view('dashboard.users.create')->with($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $email = $request->get('email');
        $password = bcrypt($request->get('password'));
        $role_id = $request->get('role_id');

        User::create([
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id
        ]);

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        $user = User::FindorFail($id);
        $roles = Role::all();
        $countries = Country::all();
        $data = ['user' => $user, 'roles' => $roles, 'countries' => $countries];
        return view('dashboard.users.show')->with($data);
    }

    public function edit($id)
    {
        $user = User::FindorFail($id);
        $roles = Role::all();
        $countries = Country::all();
        $data = ['user' => $user, 'roles' => $roles, 'countries' => $countries];
        return view('dashboard.users.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::FindorFail($id);

        $user->fill($request->all())->save();

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::FindorFail($id);
        $user->delete();
        return redirect()->route('users.index');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();
        $countries = Country::all();
        $shippingDetails = Shipping::where('user_id', $id)->get();
        $detailsCount = count($shippingDetails);
        $userDetails = Shipping::where('user_id', $id)->first();
        $orders = Order::where('user_id', $id)->paginate(10);


        if ($detailsCount === 0) {

            $data = [
                'company' => $company,
                'brands' => $brands,
                'countries' => $countries,
                'categoriesTree' => $categoriesTree,
                'orders' => $orders
            ];

            return view('frontend.users.createUserProfile')->with($data);

        } else {

            $data = [
                'company' => $company,
                'brands' => $brands,
                'categoriesTree' => $categoriesTree,
                'userDetails' => $userDetails,
                'orders' => $orders
            ];
            return view('frontend.users.userProfile')->with($data);
        }
    }

    public function showProfile($id)
    {

        $company = CompanyInfo::first();
        $brands = Brand::all();
        $userDetails = Shipping::where('user_id', $id)->first();
        $countries = Country::all();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'countries' => $countries,
            'categoriesTree' => $categoriesTree,
            'userDetails' => $userDetails
        ];

        return view('frontend.users.updateUserProfile')->with($data);
    }

    public function updateProfileDetails(Request $request, $id)
    {

        $company = CompanyInfo::first();
        $details = Shipping::where('user_id', $id)->first();

        $input = $request->all();
        $details->fill($input)->save();

        $categoriesTree = Category::getTreeHP();
        $userDetails = Shipping::where('user_id', $id)->first();
        $brands = Brand::all();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'userDetails' => $userDetails
        ];

        return view('frontend.users.userProfile')->with($data);
    }


}
