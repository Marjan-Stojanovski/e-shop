<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Volume;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontendController extends Controller
{
    //USED
    public function index()
    {
        if (Auth::user()) {

            $company = CompanyInfo::first();
            $brands = Brand::all();
            $categories = Category::all();
            $categoriesTree = Category::getTreeHP();
            $products = Product::whereNotNull('discount')->paginate(5);
            $userDetails = Shipping::where('user_id', Auth::user()->id)->first();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'categories' => $categories,
            'products' => $products,
            'userDetails' => $userDetails
        ];

        return view('frontend.index')->with($data);

        } else {

          //  $company = CompanyInfo::first();
            //$brands = Brand::all();
            //$categories = Category::all();
            //$categoriesTree = Category::getTreeHP();
            //$products = Product::whereNotNull('discount')->paginate(5);


            //$data = [
            //    'company' => $company,
            //    'brands' => $brands,
            //    'categoriesTree' => $categoriesTree,
            //    'categories' => $categories,
            //    'products' => $products,
            //];

            return redirect()->route('frontend.comingSoon');
        }
    }

    //USED
    public function product($slug)
    {
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $product = Product::where('slug', $slug)->first();
        $categoriesTree = Category::getTreeHP();
        $comments = Comment::where('product_id', $product['id'])
            ->latest('created_at')
            ->paginate(12);


        $data = [
            'company' => $company,
            'brands' => $brands,
            'product' => $product,
            'categoriesTree' => $categoriesTree,
            'comments' => $comments,
        ];

        return view('frontend.products.product')->with($data);
    }

    //USED
    public function brands()
    {
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree
        ];

        return view('frontend.brands')->with($data);
    }

    //USED
    public function contact_us()
    {
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree
        ];

        return view('frontend.feedback')->with($data);
    }

    //USED
    public function about_us()
    {
        $company = CompanyInfo::first();
        $employees = Employee::all();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();


        $data = [
            'company' => $company,
            'brands' => $brands,
            'employees' => $employees,
            'categoriesTree' => $categoriesTree
        ];

        return view('frontend.about')->with($data);
    }

    //USED
    public function shop()
    {

        if (isset($_GET)) {

            $builder = Product::query();
            if (!empty($_GET['category'])) {
                $category = $_GET['category'];
                $builder->whereIn('category_id', $category);
            }
            if (!empty($_GET['brand'])) {
                $brand = $_GET['brand'];
                $builder->whereIn('brand_id', $brand);
            }
            if (!empty($_GET['volume'])) {
                $volume = $_GET['volume'];
                $builder->whereIn('volume_id', $volume);
            }
            if (!empty($_GET['country'])) {
                $country = $_GET['country'];
                $builder->whereIn('country_id', $country);
            }
            if (!empty($_GET['discount'])) {
                $country = $_GET['discount'];
                $builder->whereNotNull('discount');
            }

            if (!empty($_GET['sort'])) {

                if ($_GET['sort'][0] == 'DESC') {
                    $builder->orderBy('price', 'DESC');
                } else if ($_GET['sort'][0] == 'ASC') {
                    $builder->orderBy('price', 'ASC');
                } else if ($_GET['sort'][0] === 'latest') {
                    $builder->latest('updated_at');
                }
            }
            $products = $builder->paginate(5);

        } else {

            $products = Product::all()->paginate(5);

        }
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $volumes = Volume::all();
        $categories = Category::all();
        $categoriesTree = Category::getTreeHP();
        $countries = Country::all();

        $data = [
            'company' => $company,
            'products' => $products,
            'categoriesTree' => $categoriesTree,
            'brands' => $brands,
            'categories' => $categories,
            'volumes' => $volumes,
            'countries' => $countries
        ];

        return view('frontend.shop')->with($data);
    }

    //USED
    public function preSignUp()
    {
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
        ];

        return view('frontend.auth.register')->with($data);
    }

    //USED
    public function preReset()
    {
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
        ];

        return view('frontend.auth.reset')->with($data);
    }

    //USED-TO BE CHECKED
    public function search(Request $request)
    {

        if ($_GET['search']) {

            $search = $_GET['search'];

            $products = Product::search($search);


            $company = CompanyInfo::first();
            $categoriesTree = Category::getTreeHP();
            $brands = Brand::all();
            $categories = Category::all();
            $volumes = Volume::all();
            $countries = Country::all();

            $data = [
                'company' => $company,
                'brands' => $brands,
                'categories' => $categories,
                'volumes' => $volumes,
                'countries' => $countries,
                'categoriesTree' => $categoriesTree,
                'products' => $products,
            ];

            return view('frontend.shop')->with($data);

        }

        $products = Product::paginate(5);
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();
        $categories = Category::all();
        $volumes = Volume::all();
        $countries = Country::all();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categories' => $categories,
            'volumes' => $volumes,
            'countries' => $countries,
            'categoriesTree' => $categoriesTree,
            'products' => $products,
        ];

        return view('frontend.shop')->with($data);
    }

    public function comingSoon()
    {
       return view('frontend.comingSoon');
    }
}
