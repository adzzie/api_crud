<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use Exception;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        return response()->json(Companies::paginate(10), Response::HTTP_OK);
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
            return response()->json(['message'=>$validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        Companies::create($request->all());
        return response()->json(null, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Companies  $companies
     * @return \Illuminate\Http\Response
     */
    public function show(Companies $companies)
    {

        return response()->json($companies, Response::HTTP_OK);

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
            return response()->json(['message'=>$validator->errors()], Response::HTTP_BAD_REQUEST);
        }
        $companies->update($request->all());
        return response()->json(null, Response::HTTP_NO_CONTENT);
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
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
