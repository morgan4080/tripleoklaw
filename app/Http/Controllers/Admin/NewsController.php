<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Categories;
use App\Admin\News;
use Image;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $newss = News::all();
        return view('Admin.news.show',compact('newss'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newss =News::all();
        $categories =Categories::all();
        return view('Admin.news.news',compact('newss','categories'));
   
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
            'title'=>'required',
            'body' => 'required',
            'category_id'=>'required',
            'image' => 'required',
            ]);
        //handle file upload
        if ($request->hasFile('image')) 
        {
           
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(400,200, function($constraint){
              $constraint->upsize();
          })->encode('jpg');
          $image_name = "one_".time().'jpg';
          $img->save('uploads/products/'.$image_name);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $imageName = 'products/'.$image_name;
           
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }
        else
        {
            return 'Please select image';
        }

        $news = new News;
        $news->news_image = $imageName;
        $news->news_title = $request->title;
        $news->news_body = $request->body;
        $news->category_id=$request->category_id;
        $news->save();

        return redirect(route('news.index'));
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
        $news = News::where('news_id',$id)->first();
        $categories =Categories::all();
        return view('Admin.news.edit',compact('categories','news'));
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
            'title'=>'required',
            'category_id'=>'required',
            'body' => 'required'
            ]);
           
        //handle file upload

        $success = "image uploaded successfully!";
        $fail = "you need an image!";
        if ($request->hasFile('image')) 
        {
           
           //Upload a copy to another folder
           $imageName = Storage::disk('uploads')->putFile('images',$request->file('image'));
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }

        else
        {
            
            return "Image not uploaded";
        }
        $news = News::find($id);
       $news->image = $imageName;
       $news->news_image = $imageName;
       $news->news_title = $request->title;
       $news->news_body = $request->body;
       $news->category_id=$request->category_id;
        $news->save();

        return redirect(route('news.index'));
    }

   
    public function destroy($id)
    {
        News::where('news_id',$id)->delete();
        return redirect()->back();
    }
    
    public function newsLetter()
    {
        return view('Admin.news.newsletter', []);
    }
}