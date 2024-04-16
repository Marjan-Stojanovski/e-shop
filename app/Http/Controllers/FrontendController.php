<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Picture;
use App\Models\Policy;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\Volume;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //USED
    public function index()
    {
        if (Auth::user()) {

            $company = CompanyInfo::first();
            $brands = Brand::latest()->take(12)->get();
            $categories = Category::latest()->take(9)->get();
            $categoriesTree = Category::getTreeHP();
            $products = Product::whereNotNull('discount')->paginate(5);
            $latestProducts = Product::with('pictures')->latest()->take(12)->get();
            $userDetails = Shipping::where('user_id', Auth::user()->id)->first();

            $data = [
                'company' => $company,
                'brands' => $brands,
                'categoriesTree' => $categoriesTree,
                'categories' => $categories,
                'products' => $products,
                'userDetails' => $userDetails,
                'latestProducts' => $latestProducts
            ];

            return view('frontend.index')->with($data);

        } else {

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
        $relatedProducts = Product::where('category_id', $product->category_id)->whereNotIn('id', [$product->id])->limit(5)->get();
        $comments = Comment::where('product_id', $product['id'])
            ->latest('created_at')
            ->paginate(12);


        $data = [
            'company' => $company,
            'brands' => $brands,
            'product' => $product,
            'categoriesTree' => $categoriesTree,
            'relatedProducts' => $relatedProducts,
            'comments' => $comments,
        ];

        return view('frontend.product')->with($data);
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
        $builder = Product::query();

        $per_page = 12;

        if (isset($_GET)) {

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
                $sort = $_GET['sort'];

                foreach ($sort as $sortOption) {
                    if ($sortOption === 'normal') {
                        $builder->orderBy('created_at', 'asc');
                    } elseif ($sortOption === 'latest') {
                        $builder->orderBy('created_at', 'desc');
                    } elseif ($sortOption === 'asc') {
                        $builder->orderBy('price', 'asc');
                    } elseif ($sortOption === 'desc') {
                        $builder->orderBy('price', 'desc');
                    }
                }

            }

            if (!empty($_GET['per_page'])) {
                $per_page = $_GET['per_page'][0];
            }

            $products = $builder->paginate($per_page)->appends($_GET);

        } else {

            $products = $builder->paginate(12);

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

    public function politika()
    {

        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();
        $policy = Policy::first();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'policy' => $policy,
        ];

        return view('frontend.policy')->with($data);
    }

    public function services()
    {

        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();

        $events = Event::all();
        $albums = Album::all();
        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'events' => $events,
            'albums' => $albums
        ];

        return view('frontend.services')->with($data);
    }

    public function albums()
    {
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();
        $albums = Album::all();

        $data = [
            'albums' => $albums,
            'categoriesTree' => $categoriesTree,
            'company' => $company,
            'brands' => $brands
        ];

        return view('frontend.albums')->with($data);
    }
    public function album($slug)
    {
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();

        $album = Album::where('slug', $slug)->first();
        $pictures = Picture::where('album_id', $album->id)->get();


        $data = [
            'album' => $album,
            'pictures' => $pictures,
            'categoriesTree' => $categoriesTree,
            'company' => $company,
            'brands' => $brands
        ];

        return view('frontend.album')->with($data);
    }


    public function comingSoon()
    {
        return view('frontend.comingSoon');
    }

    public function searchProducts(Request $request): JsonResponse
    {
        $search = $request->get('query');
        $builder = Product::query();

        if (!empty($search)) {
            $builder->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                    ->orWhere('slug', 'like', "%$search%")
                    ->orWhereHas('brand', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    })
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('name', 'like', "%$search%");
                    });
            });

            $products = $builder->with('pictures')->get();

        }

        return response()->json(['success' => $products]);
    }
}
