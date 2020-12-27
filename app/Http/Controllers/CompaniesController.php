<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Throwable;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Companies::paginate(10), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $rules=[
            'name' => 'required',
            'email' => 'nullable|email'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 400);
        }
        Companies::create($request->all());
        return response()->json(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {

        return response()->json($companies, 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Companies $companies)
    {
        // Validation
        $rules=[
            'name' => 'required',
            'email' => 'nullable|email'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json(['message'=>$validator->errors()], 400);
        }
        $companies->update($request->all());
        return response()->json(null, 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companies $companies)
    {
        $companies->delete();
        return response()->json(null, 204);
    }
}
