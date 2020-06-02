<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\Practice;
use App\Admin\Pracategories;
use Image;
use App\Http\Controllers\Controller;
use DB;

class PracticeController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');

    }
    public function index()
    {
        $practices = Practice::orderBy('practice_position', 'ASC')->get();
        return view('Admin.practice.show',compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $practices =Practice::all();
        $pracategories =Pracategories::all();
        return view('Admin.practice.practice',compact('practices','pracategories'));

    }
    public function updatePosition(Request $request)
    {
        $position=$request->get("position");
        $i=1;
        foreach($position as $k=>$v){
            Practice::where(["practice_id" => $v])->update([
                "practice_position" => $i,
            ]);
            $i++;
        }
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
            'pracategory'=>'required',
            'banner_image'=>'required',
            'title_text'=>'required',
            'image' => 'required',
            ]);
        //handle file upload
        if ($request->hasFile('image')):
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(343,329, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $image_name = "one_".time().'png';
          $img->save('uploads/products/'.$image_name,100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $imageName = 'products/'.$image_name;
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        else:
            return 'Please select image';
        endif;

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
         $pracategoryArray=implode(",",$request->pracategory);
        $practice = new Practice;
        $practice->practice_image = $imageName;
        $practice->practice_banner_image = $bannerImageName;
        $practice->practice_slug=str_slug($request->name, '-');
        $practice->practice_name = $request->name;
        $practice->practice_introduction = $request->introduction_body;
        $practice->practice_title_text= $request->title_text;
        $practice->pracategory_id=$pracategoryArray;
        $practice->save();

        return redirect(route('practice.index'));
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
        $practice = Practice::where('practice_id',$id)->first();
         $practice=DB::table('pracategories')
         ->join('practices', 'practices.pracategory_id', '=', 'pracategories.pracategory_id')->where('practice_id', $id)->first();
         //dd($practice);
         $pracategories =Pracategories::all();
        return view('Admin.practice.edit',compact('practice','pracategories'));
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
            'pracategory'=>'required',
            'title_text'=>'required',
            ]);
        $practice_id=$request->practice_id;
        $practice_image = DB::table('practices')->where('practice_id', $practice_id)->first();
         //handle file upload
        if ($request->hasFile('image')):
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(343,329, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $image_name = "one_".time().'png';
          $img->save('uploads/products/'.$image_name, 100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $imageName = 'products/'.$image_name;

           ##$url = Storage::disk('uploads')->url('file1.jpg');
        else:
             $imageName = $practice_image->practice_image;
        endif;

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
             $bannerImageName = $practice_image->practice_banner_image;
        endif;
          $pracategoryArray=implode(",",$request->pracategory);
         // dd($pracategoryArray);
        $practice = Practice::find($id);
        $practice->practice_image = $imageName;
        $practice->practice_banner_image = $bannerImageName;
        $practice->practice_slug=str_slug($request->name, '-');
        $practice->practice_name = $request->name;
        $practice->practice_introduction = $request->introduction_body;
        $practice->practice_title_text= $request->title_text;
        $practice->pracategory_id=$pracategoryArray;
        $practice->save();

        return redirect(route('practice.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Practice::where('practice_id',$id)->delete();
        return redirect()->back();
    }
}
