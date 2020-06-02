<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Admin\Practice;
use App\Admin\Team;
use Image;
use DB;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $teams=DB::table('teams')->orderBy('team_position','ASC')->get();
        return view('Admin.team.show',compact('teams'));   


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams =Team::all();
        $practices =Practice::all();
        return view('Admin.team.team',compact('teams','practices'));
   
    }
    public function updatePosition(Request $request)
    {
        $position=$request->get("position");
        $i=1;
        foreach($position as $k=>$v){
            Team::where(["team_id" => $v])->update([
                "team_position" => $i,
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
            'title'=>'required',
            'linkedin'=>'required',
            'twitter'=>'required',
            'education'=>'required',
            'phone_number'=>'required',
            'name'=>'required',
            'title_text'=>'required',
            'email'=>'required|email',
            'practice'=>'required',
            'rank'=>'required',
            'position'=>'required',
            'team_introduction' => 'required',
            'image' => 'required',
            'inner_image' => 'required',
            ]);

       
        //handle file upload
        if ($request->hasFile('image')) 
        {
           
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(263,256, function($constraint){
              $constraint->upsize();
          })->encode('jpg');
          $image_name = "one_".time().'jpg';
          $img->save('uploads/products/'.$image_name,100);
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

        //handle file upload
        if ($request->hasFile('inner_image')) 
        {
           
          $product_inner_image = $request->file('inner_image');
          //resize
          $inner_img = Image::make($product_inner_image)->fit(500,447, function($constraint){
              $constraint->upsize();
          })->encode('jpg');
          $inner_image_name = "two_".time().'jpg';
          $inner_img->save('uploads/products/'.$inner_image_name,100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $InnerImageName = 'products/'.$inner_image_name;
           
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }
        else
        {
            return 'Please select image';
        }
         $team_order="";
        if($request->rank=="management"){
          $team_order=3;
    
        } 
        if($request->rank=="leadership"){
          $team_order=1;
        } 
        if($request->rank=="general"){
          $team_order=2;
          
        } 
        $practiceArray=implode(",",$request->practice);
        $team = new Team;
        $team->team_image = $imageName;
        $team->inner_team_image = $InnerImageName;
        $team->team_title = $request->title;
        $team->team_twitter = $request->twitter;
        $team->team_linkedin = $request->linkedin;
        $team->team_activities = $request->activities;
        $team->team_name = $request->name;
        $team->team_email = $request->email;
        $team->practice_id=$practiceArray;
        $team->team_rank=$request->rank;
        $team->team_position=$request->position;
        $team->team_order=$team_order;
        $team->recognition=$request->recognition;
        $team->phone_number=$request->phone_number;
        $team->education=$request->education;
        $team->team_slug=str_slug($request->name, '-');
        $team->team_law_school = $request->law_school;
        $team->team_title_text= $request->title_text;
        $team->team_introduction = $request->team_introduction;
        $team->save();

        return redirect(route('team.index'));
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
        
          $team=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->where('teams.team_id', $id)->first();
         //dd($id);
        $practices =Practice::all();
        return view('Admin.team.edit',compact('practices','team'));
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
            'position'=>'required',
            'linkedin'=>'required',
            'twitter'=>'required',
            'name'=>'required',
            'title'=>'required',
            'education'=>'required',
            'email'=>'required|email',
            'practice'=>'required',
            'rank'=>'required',
            'title_text'=>'required',
            'team_introduction' => 'required',
            ]);
        $team_id=$request->team_id;
        $team_image = DB::table('teams')->where('team_id', $team_id)->first();
         $imageName ="";
         $InnerImageName ="";
       if ($request->hasFile('image')) 
        {
           
          $product_image = $request->file('image');
          //resize
          $img = Image::make($product_image)->fit(263,256, function($constraint){
              $constraint->upsize();
          })->encode('jpg');
          $image_name = "one_".time().'jpg';
          $img->save('uploads/products/'.$image_name,100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $imageName = 'products/'.$image_name;
           
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }
        else
        {
            $imageName = $team_image->team_image;
        }

        //handle file upload
        if ($request->hasFile('inner_image')) 
        {
           
          $product_inner_image = $request->file('inner_image');
          //resize
          $inner_img = Image::make($product_inner_image)->fit(500,447, function($constraint){
              $constraint->upsize();
          })->encode('jpg');
          $inner_image_name = "two_".time().'jpg';
          $inner_img->save('uploads/products/'.$inner_image_name,100);
          //Upload a copy to another folder
          //$imageName = Storage::disk('uploads')->put('products',$img->save($image_name));
          # Update the database
          $InnerImageName = 'products/'.$inner_image_name;
           
           ##$url = Storage::disk('uploads')->url('file1.jpg');
        }
        else
        {
           $InnerImageName = $team_image->inner_team_image;
        }
         $team_order="";
        if($request->rank=="management"){
          $team_order=3;
    
        } 
        if($request->rank=="leadership"){
          $team_order=1;
        } 
        if($request->rank=="general"){
          $team_order=2;
          
        } 
        $practiceArray=implode(",",$request->practice);
        $team = Team::find($id);
        $team->team_image = $imageName;
        $team->inner_team_image = $InnerImageName;
        $team->team_title = $request->title;
        $team->team_twitter = $request->twitter;
        $team->team_linkedin = $request->linkedin;
        $team->team_name = $request->name;
        $team->team_email = $request->email;
        $team->practice_id =  $practiceArray;
        $team->team_law_school = $request->law_school;
        $team->team_rank=$request->rank;
        $team->team_position=$request->position;
        $team->team_slug=str_slug($request->name, '-');
        $team->team_order=$team_order;
        $team->recognition=$request->recognition;
        $team->phone_number=$request->phone_number;
        $team->education=$request->education;
        $team->team_activities = $request->activities;
        $team->team_title_text= $request->title_text;
        $team->team_introduction = $request->team_introduction;
        $team->save();

        return redirect(route('team.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::where('team_id',$id)->delete();
        return redirect()->back();
    }
}
