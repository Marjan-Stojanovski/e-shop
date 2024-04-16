<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Picture;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shipping;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index()
    {
        return view('products', compact('carts'));
    }

    //USED
    public function viewCart()
    {
        $carts = session()->get('cart', []);
        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();
        $subTotal = 0;
        foreach ($carts as $cart) {
            $tempTotal = $cart['productAmount'];
            $subTotal += $tempTotal;
        }

        $data = [
            'company' => $company,
            'brands' => $brands,
            'carts' => $carts,
            'categoriesTree' => $categoriesTree,
            'subTotal' => $subTotal
        ];

        return view('frontend.shoppingCart')->with($data);
    }

//    //USED
//    public function addToCart(Request $request)
//    {
//        $product_id = $request->get('id');
//        $productTemp = Product::where('id', $product_id)->first();
//        $productSlug = $productTemp->slug;
//        $cart = session()->get('cart', []);
//
//        if (isset($cart[$product_id])) {
//            $oldQuantity = $cart[$product_id]['quantity'];
//            $newQuantity = $request->get('quantity');
//            $quantity = $oldQuantity + $newQuantity;
//            $unitPrice = $request->get('price');
//            $productAmount = $quantity * $unitPrice;
//            $cart[$product_id]['quantity'] = $quantity;
//            $cart[$product_id]['productAmount'] = $productAmount;
//            $cart[$product_id]['slug'] = $productSlug;
//        } else {
//            $quantity = $request->get('quantity');
//            $unitPrice = $request->get('price');
//            $productAmount = $quantity * $unitPrice;
//            $cart[$product_id] = [
//                "name" => $request->get('title'),
//                "slug" => $productSlug,
//                "quantity" => $request->get('quantity'),
//                "unitPrice" => $request->get('price'),
//                "product_id" => $request->get('id'),
//                "brand" => $request->get('brand'),
//                "image" => $request->get('image'),
//                "productAmount" => $productAmount
//            ];
//        }
//
//        session()->put('cart', $cart);
//
//        return redirect()->back();
//    }

    //USED
    public function deleteProduct(Request $request, $id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back();
        }
    }

    public function addToCartAjax(Request $request): JsonResponse
    {

        $id = $request->get('id');
        $product = Product::FindorFail($id);
        $pictures = ProductImage::where('product_id', $id)->get();
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
                "product_id" => $request->get('id'),
                "image" => $product_image,
                "productAmount" => $productAmount
            ];
        }

        session()->put('cart', $cart);

        $carts = session()->get('cart', []);
        return response()->json(['success' => $carts]);
    }

    public function get_carts(): JsonResponse
    {
        $carts = session()->get('cart', []);
        return response()->json(['success' => $carts]);
    }


}
