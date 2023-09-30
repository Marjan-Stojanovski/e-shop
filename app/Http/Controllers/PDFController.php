<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Employee;
use App\Models\Link;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Support\Carbon;
use PDF;

class PDFController extends Controller
{

    public function index()
    {
        $company = CompanyInfo::first();
        $lastOrder = Order::latest('created_at')
            ->first();
        $lastOrderId = $lastOrder->id;
        $orderDetails = OrderProduct::where('order_id', $lastOrderId)->get();
        $orderProductsCount = $orderDetails->count();
        $tempDate = $lastOrder->created_at;
        $dateYear = Carbon::now()->format('Y');
        $dateOrder = Carbon::createFromFormat('Y-m-d H:i:s', $tempDate)->format('M-d-Y');

        $customPaper = array(0,0,720,1440);
        $pdf = PDF::loadView('pdf.invoice',[
            'company' => $company,
            'lastOrder' => $lastOrder,
            'orderDetails' => $orderDetails,
            'dateYear' => $dateYear,
            'dateOrder' => $dateOrder,
            'orderProductsCount' => $orderProductsCount
        ])->setPaper($customPaper);

        return $pdf->stream('resume.pdf');
    }

    public function view($id)
    {

        $company = CompanyInfo::first();
        $order = Order::FindorFail($id);
        $orderDetails = OrderProduct::where('order_id', $order->id)->get();

        $orderProductsCount = $orderDetails->count();
        $tempDate = $order->created_at;
        $dateYear = Carbon::now()->format('Y');
        $dateOrder = Carbon::createFromFormat('Y-m-d H:i:s', $tempDate)->format('M-d-Y');

        $customPaper = array(0,0,720,1440);
        $pdf = PDF::loadView('pdf.invoice',[
            'company' => $company,
            'lastOrder' => $tempDate,
            'orderDetails' => $orderDetails,
            'dateYear' => $dateYear,
            'dateOrder' => $dateOrder,
            'orderProductsCount' => $orderProductsCount
        ])->setPaper($customPaper);

        return $pdf->stream('resume.pdf');
    }

}
