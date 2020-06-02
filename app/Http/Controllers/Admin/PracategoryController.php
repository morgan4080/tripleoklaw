<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\Pracategories;
use Image;
use App\Http\Controllers\Controller;
use DB;

class PracategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    }
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
        $pracategories =Pracategories::all();
        return view('Admin.pracategory.pracategory',compact('pracategories'));

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
            'name'=>'required',
            'introduction_body'=>'required',
            'banner_image'=>'required',
            'title_text'=>'required',
            ]);
       

        if ($request->hasFile('banner_image')):
          $product_image = $request->file('banner_image');
          $banner_img = Image::make($product_image)->fit(1366,364, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $banner_image_name = "two_".time().'png';
          $banner_img->save('uploads/products/'.$banner_image_name, 100);
          $bannerImageName = 'products/'.$banner_image_name;
        else:
            return 'Please select image';
        endif;

        $pracategory = new Pracategories;
        $pracategory->pracategory_banner_image = $bannerImageName;
        $pracategory->pracategory_slug=str_slug($request->name, '-');
        $pracategory->pracategory_name = $request->name;
        $pracategory->pracategory_introduction = $request->introduction_body;
        $pracategory->pracategory_title_text= $request->title_text;
        $pracategory->pracategory_id= $request->pracategory;
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
            'name'=>'required',
            'introduction_body'=>'required',
            'title_text'=>'required',
            ]);
        $pracategory_id=$request->pracategory_id;
        $pracategory_image = DB::table('pracategories')->where('pracategory_id', $pracategory_id)->first();
         //handle file upload
        if ($request->hasFile('banner_image')):
          $product_image = $request->file('banner_image');
          //resize
          $banner_img = Image::make($product_image)->fit(1366,364, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $banner_image_name = "two_".time().'png';
          $banner_img->save('uploads/products/'.$banner_image_name, 100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $bannerImageName = 'products/'.$banner_image_name;
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        else:
             $bannerImageName = $pracategory_image->pracategory_banner_image;
        endif;

        $pracategory = Pracategories::find($id);
        $pracategory->pracategory_banner_image = $bannerImageName;
        $pracategory->pracategory_slug=str_slug($request->name, '-');
        $pracategory->pracategory_name = $request->name;
        $pracategory->pracategory_introduction = $request->introduction_body;
        $pracategory->pracategory_title_text= $request->title_text;
        $pracategory->pracategory_id= $request->pracategory;
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
