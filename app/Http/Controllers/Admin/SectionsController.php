<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Admin\Sections;

use App\Admin\SectionContent;

use App\Http\Controllers\Controller;

class SectionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $page_id = $request->input('page_id');
        $page_name = $request->input('page_name');
        
        return view('Admin.sections.section',compact('page_id', 'page_name'));
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
        $this->validate($request,[
            'page_id' => 'required',
            'section_name' => 'required',
            ]);
        $section = new Sections;
        $section->page_id = $request->page_id;
        $section->section_name = $request->section_name;
        if(isset($request->description_one)):
            $section->description_one = $request->description_one;
        endif;
        if(isset($request->description_two)):
            $section->description_two = $request->description_two;
        endif;
        if(isset($request->section_image_array)):
            $section->section_image_array = $request->section_image_array;
        endif;
        if(isset($request->section_video_array)):
            $section->section_video_array = $request->section_video_array;
        endif;
        
        $section->save();
        // dd(route('pages.edit', ['id' => $request->page_id]));
        return redirect(route('sections.edit',['id' => $section->id, 'page_name' => $request->page_name, 'page_id' => $request->page_id]));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $section = Sections::where('id', $id)->first();
        $page_id = $request->input('page_id');
        $page_name = $request->input('page_name');
        $section_contents = SectionContent::where('section_id', $id)->get();
        return view('Admin.sections.edit',compact('section', 'page_id', 'page_name', 'section_contents'));
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
