<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Admin\Pages;

use App\Admin\Sections;

use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pages = Pages::all();
        return view('Admin.pages.show',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.pages.page');
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
            'page_name' => 'required',
            'page_description' => 'required',
            ]);
        $page = new Pages;
        $page->page_name = $request->page_name;
        $page->page_description = $request->page_description;
        $page->page_slug = $this->createSlug($request->page_name);
        $page->save();

        dd($page->id);
        
        return redirect(route('pages.index'));
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
         $page = Pages::where('id',$id)->first();
         $sections = Sections::where('page_id', $id)->get();
         //dd($sections);
        return view('Admin.pages.edit',compact('page', 'sections'));
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
        $this->validate($request,[
            'page_name' => 'required',
            'page_description' => 'required',
        ]);
        $page = Pages::find($id);
        $page->page_name = $request->page_name;
        $page->page_description = $request->page_description;
        $page->page_slug = $this->createSlug($request->page_name);
        $page->save();

        return redirect(route('pages.index'));
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
    
    public function createSlug($str, $delimiter = '-')
    {

    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

    } 
}
