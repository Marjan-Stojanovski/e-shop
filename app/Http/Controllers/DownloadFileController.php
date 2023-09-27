<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadFileController extends Controller
{
    public function index()
    {
        $filePath = public_path("dummy.pdf");
        $headers = ['Content-Type: application/pdf'];
        $fileName = time() . '.pdf';

        return response()->download($filePath, $fileName, $headers);
    }

    public function downloadInvoice($id)
    {

        $order = Order::FindorFail($id);
        $link = Link::where('order_id', $id)->first();
        $download = $link->pdf;
        $downloadLink = $download . '.pdf';


        $filePath = public_path("/assets/pdf/invoice/$downloadLink");


        $headers = ['Content-Type: application/pdf'];
        $fileName = $downloadLink;
        $userShownFileName ='test';

        Storage::download($fileName, $userShownFileName);
    }
}
