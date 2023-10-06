<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\ImageStore;
use App\Models\City;
use App\Models\CompanyInfo;
use App\Models\Policy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PolicyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $policy = Policy::first();

        $data = [
            'policy' => $policy,
        ];

        if (empty($policy)) {

            return view('dashboard.policy.create')->with($data);

        } else {

            return view('dashboard.policy.index')->with($data);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('policies.create')
                ->withErrors($validator)
                ->withInput();
        }

        $name = $request->get('name');
        $description = $request->get('description');


        Policy::create([
            'name' => $name,
            'description' => $description,
        ]);

        $policies = Policy::all();
        $data = ['policies' => $policies];

        return view('dashboard.policy.index')->with($data);
    }

    public function edit($id)
    {
        $policy = Policy::FindorFail($id);

        $data = ['policy' => $policy,];

        return view('dashboard.policy.edit')->with($data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->route('policies.edit')
                ->withErrors($validator)
                ->withInput();
        }

        $policy = Policy::FindorFail($id);

        $input = $request->all();

        $policy->fill($input)->save();

        $policy = Policy::first();

        $data = ['policy' => $policy,];

        return view('dashboard.policy.index')->with($data);
    }
}
