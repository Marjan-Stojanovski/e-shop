<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::paginate(12);
        $categoriesTree = Category::getTreeHP();


        $data = [
            'products' => $products,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'categories' => $categories
        ];
        return view('frontend.login')->with($data);
    }


    public function registration()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Product::paginate(12);
        $categoriesTree = Category::getTreeHP();


        $data = [
            'products' => $products,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'categories' => $categories
        ];
        return view('frontend.register')->with($data);
    }


    public function dashboard()
    {

        if (Auth::check()) {
            return view('index');
        }

        return redirect("login")->withSuccess('You are not allowed to access');
    }
}
