<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample_data;
use DataTables;
use Validator;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) 
        {
            $data = Sample_data::latest()->get();
            return DataTables::of($data)
                    ->addColumn('action',function($data){
                        $button = '<button name="edit" id="'.$data->id.'" class="ml-2 mr-2 btn btn-primary">Edit</button>';
                        $button .= '<button name="delete" id="'.$data->id.'" class="ml-2 mr-2 btn btn-danger">Delete</button>';
                 
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('sample_data');

    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $rules = array(
            'first_name' => 'required',
            'last_name'  =>  'required',
        );

        $error = Validator::make($request->all(),$rules);

        if ($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $form_data = array(
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
        );

        Sample_data::create($form_data);

        return response()->json(['success' =>'Data Added Successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
