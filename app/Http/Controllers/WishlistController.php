<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Product;
use App\Models\Wishlist;
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

    //USED
    public function create($id)
    {
        $product = Wishlist::where('product_id', $id)
            ->where('user_id', Auth::user()->id)
            ->get();

        if (count($product) == 0) {

            Wishlist::create([
                'user_id' => Auth::user()->id,
                'product_id' => $id
            ]);

            return redirect()->back();

        }

        return redirect()->back();
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

        $product_id = $request->get('id');
        $productTemp = Product::where('id', $product_id)->first();
        $productSlug = $productTemp->slug;
        $cart = session()->get('cart', []);

        if (isset($cart[$product_id])) {
            $oldQuantity = $cart[$product_id]['quantity'];
            $newQuantity = $request->get('quantity');
            $quantity = $oldQuantity + $newQuantity;
            $unitPrice = $request->get('price');
            $productAmount = $quantity * $unitPrice;
            $cart[$product_id]['quantity'] = $quantity;
            $cart[$product_id]['productAmount'] = $productAmount;
            $cart[$product_id]['slug'] = $productSlug;
        } else {
            $quantity = $request->get('quantity');
            $unitPrice = $request->get('price');
            $productAmount = $quantity * $unitPrice;
            $cart[$product_id] = [
                "name" => $request->get('title'),
                "slug" => $productSlug,
                "quantity" => $request->get('quantity'),
                "unitPrice" => $request->get('price'),
                "product_id" => $request->get('id'),
                "brand" => $request->get('brand'),
                "image" => $request->get('image'),
                "productAmount" => $productAmount
            ];
        }

        session()->put('cart', $cart);

        $product = Wishlist::FindorFail($id);

        $product->delete();

        return redirect()->back();
    }
}
