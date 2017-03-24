<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Lead;


class LeadsController extends Controller
{
    /*
    ==== API Methods for Future Reference ===
    --- Routes for these methods must be defined
    --- In the API routes File
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leads = Lead::paginate(5);
    	return $leads;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if((!$request->first_name) || (!$request->last_name)
        	|| (!$request->email) || (!$request->telephone_number)){

            $response = Response::json([
                'error' => [
                    'message' => 'Please enter all required fields'
                ]
            ], 422);
            return $response;
        }

        $lead = new Lead(array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'telephone_number' => $request->telephone_number,
        ));

        $lead->save();

        $response = Response::json([
            'message' => 'The lead has been created succesfully',
            'data' => $lead,
        ], 201);

        return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lead = Lead::find($id);
        if (!$lead){
        	$response = Response::json([
        		'error' =>[
        		'message' => 'This record cannot be found.']
        		],404);
        	return $response;
        }
        $response = Response::json($lead, 200);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if((!$request->first_name) || (!$request->last_name)
        	|| (!$request->email) || (!$request->telephone_number)){

            $response = Response::json([
                'error' => [
                    'message' => 'Please enter all required fields'
                ]
            ], 422);
            return $response;
        }

        $lead = Lead::find($id);
        $lead->first_name = $request->first_name;
        $lead->last_name = $request->last_name;
        $lead->email = $request->email;
        $lead->telephone_number = $request->telephone_number;
        $lead->save();

        $response = Response::json([
            'message' => 'The lead has been updated.',
            'data' => $lead,
        ], 200);

        return $response;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lead = Lead::find($id);

        if(!$lead) {
            $response = Response::json([
                'error' => [
                    'message' => 'The lead cannot be found.'
                ]
            ], 404);

            return $response;
        }

        Lead::destroy($id);

        $response = Response::json([
            'message' => 'The lead has been deleted.'
        ], 200);

        return $response;
        }
        
}
