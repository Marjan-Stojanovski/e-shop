<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Country;
use App\Models\Picture;
use App\Models\ProductImage;
use App\Models\User;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Helpers\ImageStore;
use App\Models\Product;
use App\Models\Role;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        $brands = Brand::all();
        $volumes = Volume::all();
        $countries = Country::all();

        $data = [
            'products' => $products,
            'brands' => $brands,
            'volumes' => $volumes,
            'countries' => $countries
        ];
        return view('dashboard.products.index')->with($data);
    }

    public function create()
    {
        $products = Product::all();
        $users = User::all();
        $categories = Category::getList();
        $brands = Brand::all();
        $volumes = Volume::all();
        $countries = Country::all();

        $data = [
            'products' => $products,
            'users' => $users,
            'categories' => $categories,
            'brands' => $brands,
            'volumes' => $volumes,
            'countries' => $countries
        ];
        return view('dashboard.products.create')->with($data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:products',
            'image' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'short_info' => 'required',
            'user_id' => 'required',
            'brand_id' => 'required',
            'volume_id' => 'required',
            'alcohol' => 'required|numeric|regex:/^\d+(\.\d{1})?$/',
            'price' => 'required|numeric|regex:/^\d+(\.\d{1})?$/',
            'country_id' => 'required'
        ], [
            'brand_id.required' => 'Choose brand',
            'volume_id.required' => 'Choose volume',
            'country_id.required' => 'Choose country',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        dd($request);

        $loggedUser = Auth::user();

        $product = Product::create([
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'alcohol' => $request->get('alcohol'),
            'price' => $request->get('price'),
            'discount' => $request->get('discount'),
            'discounted_price' => $request->get('discounted_price'),
            'category_id' => $request->get('category_id'),
            'user_id' => $loggedUser->id,
            'brand_id' => $request->get('brand_id'),
            'volume_id' => $request->get('volume_id'),
            'country_id' => $request->get('country_id')
        ]);

        $files = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $tempName = $file->getClientOriginalName();
                $name = rand(1000, 100000) . '-' . $tempName;
                $file->move(public_path('images/products/' . $product->name . '/'), $name);
                $files[] = $name;
            }
        }

        foreach ($files as $file) {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $file,
            ]);
        }

        return redirect()->route('products.index');

    }

    public function edit($id)
    {
        $product = Product::FindorFail($id);
        $categories = Category::getList();
        $users = User::all();
        $brands = Brand::all();
        $volumes = Volume::all();
        $countries = Country::all();

        $data = [
            'product' => $product,
            'users' => $users,
            'categories' => $categories,
            'brands' => $brands,
            'volumes' => $volumes,
            'countries' => $countries];

        return view('dashboard.products.edit')->with($data);
    }

    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'image' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'user_id' => 'required',
            'brand_id' => 'required',
            'volume_id' => 'required',
            'alcohol' => 'required',
            'price' => 'required',
            'country_id' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $product = Product::FindorFail($id);
        $image = $request->get('image');
        $imageObj = new ImageStore($request, 'products');
        $image = $imageObj->imageStore();

        $input = $request->all();
        $input['image'] = $image;

        $product->fill($input)->save();

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::FindorFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}

