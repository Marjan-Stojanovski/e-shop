<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Picture;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Wishlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class WishlistController extends Controller
{
    //USED
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::user()->id)->paginate(12);
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'wishlists' => $wishlists
        ];

        return view('frontend.users.wishlist')->with($data);
    }

    public function add_wishlist(Request $request): JsonResponse
    {
        $id = $request->get('id');
        $changes = null;
        if (Auth::user()) {
            $product = Wishlist::where('product_id', $id)
                ->where('user_id', Auth::user()->id)
                ->get();

            if (count($product) == 0) {
                Wishlist::create([
                    'user_id' => Auth::user()->id,
                    'product_id' => $id
                ]);

                $changes = "Added to wishlist";

                return response()->json(['success' => $changes]);

            }

            $changes = "Already in wishlist";
            return response()->json(['warning' => $changes]);
        }

        return redirect()->route('login');
    }
    //USED
    public function delete($id)
    {
        $product = Wishlist::FindorFail($id);

        $product->delete();

        return redirect()->back();
    }

    //USED
    public function addToCart_deleteWishlist(Request $request, $id)
    {

        $product_id = $request->get('product_id');
        $product = Product::FindorFail($product_id);
        $pictures = ProductImage::where('product_id', $product_id)->get();
        if($product->discounted_price) {
            $price = $product->discounted_price;
        } else {
            $price = $product->price;
        }
        $product_image = $pictures[0]->image;
        $product_slug = $product->slug;

        $cart = session()->get('cart', []);


        if (isset($cart[$product->id])) {
            $oldQuantity = $cart[$product->id]['quantity'];
            $newQuantity = $request->get('quantity');
            $quantity = $oldQuantity + $newQuantity;
            $unitPrice = $price;
            $productAmount = $quantity * $unitPrice;
            $cart[$product->id]['quantity'] = $quantity;
            $cart[$product->id]['productAmount'] = $productAmount;
            $cart[$product->id]['slug'] = $product_slug;
        } else {
            $quantity = $request->get('quantity');
            $unitPrice = $price;
            $productAmount = $quantity * $unitPrice;
            $cart[$product->id] = [
                "name" => $product->name,
                "slug" => $product_slug,
                "quantity" => $request->get('quantity'),
                "unitPrice" => $price,
                "product_id" => $request->get('product_id'),
                "image" => $product_image,
                "productAmount" => $productAmount
            ];
        }

        session()->put('cart', $cart);

        $product = Wishlist::FindorFail($id);

        $product->delete();

        return redirect()->back();
    }
}
