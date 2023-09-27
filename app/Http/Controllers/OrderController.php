<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Country;
use App\Models\OrderProduct;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Session;
use PDF;
use App\Models\Product;
use App\Models\Link;


class OrderController extends Controller
{
    public function listOrders()
    {
        $ordersCount = Order::all()->count();
        $orders = Order::orderBy('id', 'DESC')->paginate(12);
        $shipped = Order::where('order_status', 'shipped')->get()->count();
        $inProgress = Order::where('order_status', 'in-progress')->get()->count();
        $cancelled = Order::where('order_status', 'cancelled')->get()->count();

        $data = [
            'orders' => $orders,
            'ordersCount' => $ordersCount,
            'shipped' => $shipped,
            'inProgress' => $inProgress,
            'cancelled' => $cancelled,
        ];

        return view('dashboard.orders.index')->with($data);
    }

    public function listUserOrders($id)
    {
        $orders = Order::where('user_id', $id)->paginate(12);
        $brands = Brand::all();
        $company = CompanyInfo::first();
        $userDetails = Shipping::where('user_id', $id)->first();
        $categoriesTree = Category::getTreeHP();

        $data = [
            'orders' => $orders,
            'company' => $company,
            'brands' => $brands,
            'userDetails' => $userDetails,
            'categoriesTree' => $categoriesTree,
        ];

        return view('frontend.users.userProfileOrders')->with($data);
    }

    public function getOrder($id)
    {
        $order = Order::FindorFail($id);

        $data = [
            'order' => $order
        ];

        return view('dashboard.orders.edit')->with($data);
    }

    public function changeStatus(Request $request, $id)
    {
        $status = $request->get('status');
        $order = Order::FindorFail($id);
        $order['order_status'] = $status;
        $order->save();

        $company = CompanyInfo::all();
        $subject = 'Re: Order #' . $order->id;
        $msg = 'Order: #' . $order->id . ' changed status to ' . $order->order_status;

        Mail::to($order->email)->send(new MailSender($msg, $subject, $company));


        return redirect()->back();
    }

    public function viewUserOrder($id)
    {
        $order = Order::FindorFail($id);
        $products = OrderProduct::where('order_id', $order->id)->get();
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'categoriesTree' => $categoriesTree,
            'order' => $order,
            'products' => $products
        ];

        return view('frontend.users.orderDetails')->with($data);
    }

    public function delete($id)
    {
        $order = Order::FindorFail($id);
        $order->delete();

        return redirect()->back();
    }


    public function orderDetails()
    {

        $products = session()->get('cart', []);
        $company = CompanyInfo::first();
        $countries = Country::all();
        $categoriesTree = Category::getTreeHP();
        $subTotal = 0;
        $shippingCharges = 0;
        foreach ($products as $product) {
            $tempTotal = $product['productAmount'];
            $subTotal += $tempTotal;
        }

        if ($subTotal <= 50) {
            $shippingCharges = 5;
        }
        $total = $subTotal + $shippingCharges;

        if (Auth::user()) {
            $user_id = Auth::user()->id;
            $shippingDetails = Shipping::where('user_id', $user_id)->first();

            if (!isset($shippingDetails)) {
                $data = [
                    'company' => $company,
                    'countries' => $countries,
                    'categoriesTree' => $categoriesTree,
                    'shippingDetails' => $shippingDetails,
                    'products' => $products,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'shippingCharges' => $shippingCharges
                ];
                return view('frontend.storeUserInfo')->with($data);
            }
            $data = [
                'company' => $company,
                'countries' => $countries,
                'categoriesTree' => $categoriesTree,
                'shippingDetails' => $shippingDetails,
                'products' => $products,
                'subTotal' => $subTotal,
                'total' => $total,
                'shippingCharges' => $shippingCharges
            ];
            return view('frontend.orderDetails')->with($data);
        } else {
            $data = [
                'company' => $company,
                'countries' => $countries,
                'categoriesTree' => $categoriesTree,
                'products' => $products,
                'subTotal' => $subTotal,
                'total' => $total,
                'shippingCharges' => $shippingCharges
            ];
        }

        return view('frontend.orderDetails')->with($data);
    }


    public function processOrder(Request $request)
    {

        $paymentOption = $request->get('paymentOption');
        $firstName = $request->get('firstName');
        $lastName = $request->get('lastName');
        $phoneNumber = $request->get('phoneNumber');
        $email = $request->get('email');
        $address = $request->get('address');
        $zipcode = $request->get('zipcode');
        $city = $request->get('city');
        $country_id = $request->get('country_id');
        $country_temp = Country::where('id', $country_id)->get();
        $country = $country_temp[0]['name'];
        $comment = $request->get('comment');
        $companyName = $request->get('companyName');
        $taxNumber = $request->get('taxNumber');
        $shipFirstName = $request->get('shipFirstName');
        $shipLastName = $request->get('shipLastName');
        $shipPhoneNumber = $request->get('shipPhoneNumber');
        $shipEmail = $request->get('shipEmail');
        $shipAddress = $request->get('shipAddress');
        $shipZipcode = $request->get('shipZipcode');
        $shipComment = $request->get('shipComment');
        $shipCity = $request->get('shipCity');
        $shipCountry_id = $request->get('shipCountry_id');
        $paymentFullName = $request->get('paymentFullName');
        $cardName = $request->get('cardName');
        $cardNumber = $request->get('cardNumber');
        $expDateMonth = $request->get('expDateMonth');
        $expDateYear = $request->get('expDateYear');
        $csv = $request->get('csv');

        //Unique order_id generator///
        do {
            $uniqueNumber = mt_rand(100000, 999999);
            $temp = Order::where('order_id', $uniqueNumber)->get();
        } while (!isset($temp));
        //END Unique order_id generator///

        // Total Charges Calculation
        $products = session()->get('cart', []);
        $total = 0;
        $subTotal = 0;
        foreach ($products as $product) {
            $tempTotal = $product['productAmount'];
            $subTotal += $tempTotal;
        }
        $shippingCharges = 0;
        if ($subTotal < 50) {
            $shippingCharges = 5;
        }
        $total = $subTotal + $shippingCharges;
        // End Total Charges Calculation

//SO FAR OK

        if ($paymentOption === 'offer') {
            //OFFER, SO NOT PAYED -->0
            $paymentStatus = 0;
            if (Auth::user()) {
                $user_id = Auth::user()->id;
                Order::create([
                    'user_id' => $user_id,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'phoneNumber' => $phoneNumber,
                    'email' => $email,
                    'address' => $address,
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'country_id' => $country_id,
                    'comment' => $comment,
                    'companyName' => $companyName,
                    'taxNumber' => $taxNumber,
                    'shipFirstName' => $shipFirstName,
                    'shipLastName' => $shipLastName,
                    'shipPhoneNumber' => $shipPhoneNumber,
                    'shipEmail' => $shipEmail,
                    'shipAddress' => $shipAddress,
                    'shipZipcode' => $shipZipcode,
                    'shipCity' => $shipCity,
                    'shipCountry_id' => $shipCountry_id,
                    'shipComment' => $shipComment,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'shippingCharges' => $shippingCharges,
                    'order_id' => $uniqueNumber,
                    'payment_status' => $paymentStatus,
                    'uniqueNumber' => $uniqueNumber
                ]);
            } else {
                Order::create([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'phoneNumber' => $phoneNumber,
                    'email' => $email,
                    'address' => $address,
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'country_id' => $country_id,
                    'comment' => $comment,
                    'companyName' => $companyName,
                    'taxNumber' => $taxNumber,
                    'shipFirstName' => $shipFirstName,
                    'shipLastName' => $shipLastName,
                    'shipPhoneNumber' => $shipPhoneNumber,
                    'shipEmail' => $shipEmail,
                    'shipAddress' => $shipAddress,
                    'shipZipcode' => $shipZipcode,
                    'shipCity' => $shipCity,
                    'shipCountry_id' => $shipCountry_id,
                    'shipComment' => $shipComment,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'shippingCharges' => $shippingCharges,
                    'order_id' => $uniqueNumber,
                    'payment_status' => $paymentStatus,
                    'uniqueNumber' => $uniqueNumber
                ]);
            }

            $carts = session()->get('cart', []);
            // Saving OrderProducts
            $order = Order::where('order_id', $uniqueNumber)->first();
            $order_id = $order->id;
            foreach ($carts as $cart) {
                $product_id = $cart['product_id'];
                $quantity = $cart['quantity'];
                $unitPrice = $cart['unitPrice'];
                $price = $cart['productAmount'];
                OrderProduct::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'unitPrice' => $unitPrice,
                    'price' => $price,
                    'order_parent' => $uniqueNumber
                ]);
            }

            //CREATE AND SAVE PO
            $company = CompanyInfo::first();
            $categoriesTree = Category::getTreeHP();
            $orderInfo = Order::where('order_id', $uniqueNumber)->first();
            $orderProducts = OrderProduct::where('order_parent', $uniqueNumber)->get();
            $brands = Brand::all();

            $data = [
                'company' => $company,
                'brands' => $brands,
                'categoriesTree' => $categoriesTree,
                'orderInfo' => $orderInfo,
                'orderProducts' => $orderProducts
            ];

            $year = date('y');
            $pdf = Pdf::loadView('pdf.invoice', $data);
            $pdf->save('assets/pdf/invoice/' . $year . '-' . $orderInfo->id . ' .pdf');

            //SEND CONFIRM EMAIL
            $data["email"] = "$orderInfo->email";
            $data["title"] = "Predplačilo -PRIMER";
            $data["orderID"] = "$year-$orderInfo->id";
            $files = [
                public_path('assets/pdf/invoice/' . $year . '-' . $orderInfo->id . ' .pdf'),
            ];

            Mail::send('mail.beforePay', $data, function ($message) use ($data, $files) {
                $message->to($data["email"])
                    ->subject($data["title"]);
                foreach ($files as $file) {
                    $message->attach($file);
                }
            });

            //LINK ORDER_ID with file
            Link::create([
                'order_id' => $orderInfo->id,
                'pdf' => $data["orderID"]
            ]);

            session()->forget('cart');

            return view('frontend.finishOrder')->with($data);

        } elseif ($paymentOption === 'creditCard') {

            $validator = Validator::make($request->all(), [
                'paymentFullName' => 'required',
                'cardName' => 'required',
                'cardNumber' => 'required|min:16|max:16',
                'expDateMonth' => 'required|min:2|max:2',
                'expDateYear' => 'required|min:4|max:4',
                'csv' => 'required|min:3|max:3'
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $paymentInfo = [
                'paymentFullName' => $paymentFullName,
                'cardName' => $cardName,
                'cardNumber' => $cardNumber,
                'expDateMonth' => $expDateMonth,
                'expDateYear' => $expDateYear,
                'csv' => $csv,
            ];

            dd('SetUp Stripe');
            $paymentStatus = 1;

            if (Auth::user()) {
                $user_id = Auth::user()->id;
                Order::create([
                    'user_id' => $user_id,
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'phoneNumber' => $phoneNumber,
                    'email' => $email,
                    'address' => $address,
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'country_id' => $country_id,
                    'comment' => $comment,
                    'companyName' => $companyName,
                    'taxNumber' => $taxNumber,
                    'shipFirstName' => $shipFirstName,
                    'shipLastName' => $shipLastName,
                    'shipPhoneNumber' => $shipPhoneNumber,
                    'shipEmail' => $shipEmail,
                    'shipAddress' => $shipAddress,
                    'shipZipcode' => $shipZipcode,
                    'shipCity' => $shipCity,
                    'shipCountry_id' => $shipCountry_id,
                    'shipComment' => $shipComment,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'shippingCharges' => $shippingCharges,
                    'order_id' => $uniqueNumber,
                    'payment_status' => $paymentStatus,
                    'uniqueNumber' => $uniqueNumber
                ]);
            } else {
                Order::create([
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'phoneNumber' => $phoneNumber,
                    'email' => $email,
                    'address' => $address,
                    'zipcode' => $zipcode,
                    'city' => $city,
                    'country_id' => $country_id,
                    'comment' => $comment,
                    'companyName' => $companyName,
                    'taxNumber' => $taxNumber,
                    'shipFirstName' => $shipFirstName,
                    'shipLastName' => $shipLastName,
                    'shipPhoneNumber' => $shipPhoneNumber,
                    'shipEmail' => $shipEmail,
                    'shipAddress' => $shipAddress,
                    'shipZipcode' => $shipZipcode,
                    'shipCity' => $shipCity,
                    'shipCountry_id' => $shipCountry_id,
                    'shipComment' => $shipComment,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'shippingCharges' => $shippingCharges,
                    'order_id' => $uniqueNumber,
                    'payment_status' => $paymentStatus,
                    'uniqueNumber' => $uniqueNumber
                ]);
            }

            $carts = session()->get('cart', []);
            // Saving OrderProducts
            $order = Order::where('order_id', $uniqueNumber)->first();
            $order_id = $order->id;
            foreach ($carts as $cart) {
                $product_id = $cart['product_id'];
                $quantity = $cart['quantity'];
                $unitPrice = $cart['unitPrice'];
                $price = $cart['productAmount'];
                OrderProduct::create([
                    'order_id' => $order_id,
                    'product_id' => $product_id,
                    'quantity' => $quantity,
                    'unitPrice' => $unitPrice,
                    'price' => $price,
                    'order_parent' => $uniqueNumber
                ]);
            }

            //CREATE AND SAVE PO
            $company = CompanyInfo::first();
            $categoriesTree = Category::getTreeHP();
            $orderInfo = Order::where('order_id', $uniqueNumber)->first();
            $orderProducts = OrderProduct::where('order_parent', $uniqueNumber)->get();
            $brands = Brand::all();

            $data = [
                'company' => $company,
                'brands' => $brands,
                'categoriesTree' => $categoriesTree,
                'orderInfo' => $orderInfo,
                'orderProducts' => $orderProducts
            ];

            $year = date('y');
            $pdf = Pdf::loadView('pdf.invoice', $data);
            $pdf->save('assets/pdf/invoice/' . $year . '-' . $orderInfo->id . ' .pdf');

            //SEND CONFIRM EMAIL
            $data["email"] = "$orderInfo->email";
            $data["title"] = "Predplačilo -PRIMER";
            $data["orderID"] = "$year-$orderInfo->id";
            $files = [
                public_path('assets/pdf/invoice/' . $year . '-' . $orderInfo->id . ' .pdf'),
            ];

            Mail::send('mail.beforePay', $data, function ($message) use ($data, $files) {
                $message->to($data["email"])
                    ->subject($data["title"]);
                foreach ($files as $file) {
                    $message->attach($file);
                }
            });

            //LINK ORDER_ID with file
            Link::create([
                'order_id' => $orderInfo->id,
                'pdf' => $data["orderID"]
            ]);

            session()->forget('cart');

            return view('frontend.finishOrderPayed')->with($data);

        } else {

            return redirect()->back();

        }


        //OK AFTER THIS

        // DELETE SESSION INFO
        session()->forget('cart');

        //BACK TO VIEW -> Invoice View
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $orderInfo = Order::where('order_id', $uniqueNumber)->first();
        $orderProducts = OrderProduct::where('order_parent', $uniqueNumber)->get();

        $data = [
            'company' => $company,
            'categoriesTree' => $categoriesTree,
            'orderInfo' => $orderInfo,
            'orderProducts' => $orderProducts
        ];

        return view('frontend.orders.finished-order')->with($data);
    }

    //USED
    public function checkout()
    {
        if (Auth::user()) {
            $company = CompanyInfo::first();
            $brands = Brand::all();
            $categoriesTree = Category::getTreeHP();
            $carts = session()->get('cart', []);
            $countries = Country::all();

            $data = [
                'company' => $company,
                'brands' => $brands,
                'carts' => $carts,
                'categoriesTree' => $categoriesTree,
                'countries' => $countries,
            ];

            return view('frontend.cartCheckout')->with($data);
        }

        $company = CompanyInfo::first();
        $brands = Brand::all();
        $categoriesTree = Category::getTreeHP();
        $carts = session()->get('cart', []);


        $data = [
            'company' => $company,
            'brands' => $brands,
            'carts' => $carts,
            'categoriesTree' => $categoriesTree,
        ];

        return redirect()->route('login')->with($data);
    }

}
