<?php

namespace App\Http\Controllers;
use App\Sample_data;
use Illuminate\Http\Request;

class sample_dataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Sample_data::latest()->paginate(5);
        return view('index',compact('data'))
        ->with('i', (request()->input('page',1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required|numeric'
        ]);

       $form_data = array(
        'name' => $request->name, 
        'age' => $request->age 
    );

       Sample_data::create($form_data);
       return redirect('crud')->with('success','Data Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Sample_data::findOrFail($id);
        return view('view',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $data = Sample_data::findOrFail($id);
        return view('update',compact('data'));

        
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
         $request->validate([
            'name' => 'required',
              'age' => 'required|numeric'
        ]);

       $form_data = array(
        'name' => $request->name, 
        'age' => $request->age 
    );

       Sample_data::whereId($id)->update($form_data);
       return redirect('crud')->with('success','Data editted Successfully.');    
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $data = Sample_data::findOrFail($id);
         $data->delete();
         return redirect('crud')->with('delete','Data Deleted Successfully.');
    }
}
