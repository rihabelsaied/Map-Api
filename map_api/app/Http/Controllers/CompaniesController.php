<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Session;


class CompaniesController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function store( Request $request)
    {   
        $request->validate
        ([
        'branch_name' => 'required ',
        'address' =>'required',
        ]);
        $branches =Company::create($request->all());
        if ($branches) 
        {
            Session::put('mesage', 'This Branch Added Sucessful');
        }
    
        return redirect()->back();
    }
    public function show()
    {
        $data =Company::all();
        return response()->json($data);
    }
}
