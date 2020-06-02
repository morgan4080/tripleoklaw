<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\Categories;
use App\Admin\Articles;
use Image;
use DB;
use App\Admin\Team;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $articles = Articles::all();
        return view('Admin.article.show',compact('articles'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $articles =Articles::all();
        $categories =Categories::all();
        $teams =Team::all();

        return view('Admin.article.article',compact('articles','categories','teams'));
   
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
            'team_id'=>'required',
            'image' => 'required',
            ]);
        //handle file upload
        if ($request->hasFile('image')) 
        {
           
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(292,414, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $image_name = "one_".time().'png';
          $img->save('uploads/products/'.$image_name, 100);
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

        $article = new Articles;
        $article->article_image = $imageName;
        $article->article_title = $request->title;
        $article->article_body = $request->body;
        $article->article_video_url = $request->video;
        $article->category_id=$request->category_id;
        $article->article_slug=str_slug($request->title, '-');
        $article->team_id=$request->team_id;
        $article->slider_one=$request->slider_one;
        $article->slider_one=$request->slider_two;
        $article->save();

        return redirect(route('article.index'));
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
        $article=DB::table('categories')
         ->join('articles', 'articles.category_id', '=', 'categories.category_id') ->join('teams', 'articles.team_id', '=', 'teams.team_id')->first();
        // dd($article);
        $categories =Categories::all();
        $teams =Team::all();
        return view('Admin.article.edit',compact('categories','article','teams'));
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
            'team_id'=>'required',
            'body' => 'required',
            ]);
          $article_id=$request->article_id;
        $article_image = DB::table('articles')->where('article_id', $article_id)->first();
         $imageName ="";
        //handle file upload
        if ($request->hasFile('image')) 
        {
           
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(292,414, function($constraint){
              $constraint->upsize();
          })->encode('png');
          $image_name = "one_".time().'png';
          $img->save('uploads/products/'.$image_name, 100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $imageName = 'products/'.$image_name;
           
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }
         else
        {
            $imageName = $article_image->article_image;
        }
       $article = Articles::find($id);
       $article->article_image = $imageName;
       $article->article_image = $imageName;
       $article->article_title = $request->title;
       $article->article_body = $request->body;
       $article->article_video_url = $request->video;
       $article->article_slug=str_slug($request->title, '-');
       $article->category_id=$request->category_id;
       $article->team_id=$request->team_id;
       $article->slider_one=$request->slider_one;
        $article->slider_one=$request->slider_two;
        $article->save();

        return redirect(route('article.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Articles::where('article_id',$id)->delete();
        return redirect()->back();
    }
}
