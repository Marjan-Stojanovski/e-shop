<?php

namespace App\Http\Controllers;

use App\Mail\MailSender;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CompanyInfo;
use App\Models\Message;
use App\Models\Shipping;
use Illuminate\Cache\RetrievesMultipleKeys;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $messages = Message::all();
        $data =[
            'messages' => $messages,
        ];
        return view('dashboard.messages.index')->with($data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullName'         => 'required|max:255',
            'email'         => 'required',
            'phone'   => 'required',
            'subject'   => 'required',
            'message'   => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('frontend.feedback')
                ->withErrors($validator)
                ->withInput();
        }
        $user_id = Auth::user()->id;
        $fullName = $request->get('fullName');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $subject = $request->get('subject');
        $message = $request->get('message');

        Message::create([
           'fullName' => $fullName,
           'user_id' => $user_id,
           'email' => $email,
           'phone' => $phone,
           'subject' => $subject,
           'message' => $message,
        ]);
        Session::flash('flash_message', 'Пораката е испратена!');
        return redirect()->back();
    }
    public function show($id)
    {
        $message = Message::FindorFail($id);
        $data = [
            'message' => $message,
        ];
        return view('dashboard.messages.show')->with($data);
    }

    public function update(Request $request, $id)
    {
        $message = Message::FindorFail($id);
        $message->fill($request->all())->save();
        $messages = Message::all();

        $data =[
            'messages' => $messages,
        ];
        return view('dashboard.messages.index')->with($data);
    }
    public function delete($id)
    {
        $message = Message::FindorFail($id);
        $message->delete();

        $messages = Message::all();
        $data =[
            'messages' => $messages,
        ];
        return view('dashboard.messages.index')->with($data);
    }

    public function answer($id)
    {
        $originalMessage = Message::FindorFail($id);

        $data = [
            'originalMessage' => $originalMessage,
        ];

        return view('dashboard.messages.answer')->with($data);
    }

    public function sendResponse(Request $request, $id)
    {
        $originalMessage = Message::FindorFail($id);
        $email = $originalMessage->email;
        $subject = 'Re: '.$originalMessage->subject;
        $company = CompanyInfo::all();
        $msg = $request->get('messageResponse');

        Mail::to($email)->send(new MailSender($msg, $subject, $company));
        return redirect()->back();
    }

    public function userMessages($id)
    {

        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $userDetails = Shipping::where('user_id', $id)->first();
        $brands = Brand::all();
        $messages = Message::where('user_id', $id)->paginate(12);

        $data = [
            'company' => $company,
            'brands' => $brands,
            'messages' => $messages,
            'categoriesTree' => $categoriesTree,
            'userDetails' => $userDetails
        ];

        return view('frontend.user.userMessages')->with($data);
    }

    public function viewUserMessage($id)
    {
        $message = Message::FindorFail($id);
        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();

        $data = [
            'company' => $company,
            'brands' => $brands,
            'message' => $message,
            'categoriesTree' => $categoriesTree,
        ];

        return view('frontend.user.viewUserMessage')->with($data);
    }

    public function deleteUserMessage($id)
    {
        $message = Message::FindorFail($id);

        $message->delete();

        $company = CompanyInfo::first();
        $categoriesTree = Category::getTreeHP();
        $brands = Brand::all();
        $messages = Message::where('user_id', Auth::user()->id)->paginate(12);

        $data = [
            'company' => $company,
            'brands' => $brands,
            'messages' => $messages,
            'categoriesTree' => $categoriesTree,
        ];

        return view('frontend.user.userMessages')->with($data);
    }
}
