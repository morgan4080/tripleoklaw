<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\Pracategories;
use App\Http\Controllers\Controller;

class PracategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $pracategories = Pracategories::all();
        return view('Admin.pracategory.show',compact('pracategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pracategory.pracategory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            ]);
        $pracategory = new Pracategories;
        $pracategory->pracategory_name = $request->name;
        $pracategory->save();

        return redirect(route('pracategory.index'));
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
        $pracategory = Pracategories::where('pracategory_id',$id)->first();
        return view('Admin.pracategory.edit',compact('pracategory'));
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
        $this->validate($request,[
            'name' => 'required',
            ]);
        $pracategory = pracategories::find($id);
        $pracategory->pracategory_name = $request->name;
        $pracategory->save();

        return redirect(route('pracategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pracategories::where('pracategory_id',$id)->delete();
        return redirect()->back();
    }
}
