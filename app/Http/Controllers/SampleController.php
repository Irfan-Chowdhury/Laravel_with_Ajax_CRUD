<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sample_data;
use DataTables;

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
                        $button = '<button name="edit" id="'.$data->id.'" class="m-2 btn btn-primary">Edit</button>';
                        $button .= '<button name="delete" id="'.$data->id.'" class="m-2 btn btn-danger">Delete</button>';
                 
                        return $button;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('sample_data');

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
        //
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
