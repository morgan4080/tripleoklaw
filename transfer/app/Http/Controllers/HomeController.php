<?php

namespace App\Http\Controllers;
use App\Admin\Jobs;
use DB;
use App\Admin\Team;
use App\Admin\Applications;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
         $articles=DB::table('articles')->limit(2)->get();
         $asideArticles=DB::table('articles')->limit(3)->latest('created_at')->get();
           $practices=DB::table('practices')->get();
        return view('front/home',compact('articles','asideArticles','practices'));
    }
    public function join(){
         $jobs =Jobs::all();
          $practices=DB::table('practices')->get();
        return view('front/join',compact('jobs','practices'));
    }
    public function team(){
    	$leadership=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id')
         ->where('team_rank', '=','leadership')->orderByRaw('team_position ASC')->get();
    	$management=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id')
         ->where('team_rank', '=','management')->orderByRaw('team_position ASC')->get();
    	$allPeople=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id') ->where('team_rank', '=','general')->orderByRaw('team_position ASC')->get();
    	return view('front/team',compact('leadership','management','allPeople'));

    }
    public function team_detail($slug){
        
    	$personDetails=$team = Team::where('team_slug',$slug)->first();
    	
    	$teamTitle = strip_tags($personDetails->team_title_text);
          $practice_id[]="";
     
        
           $pracs[]=preg_split ("/\,/",$personDetails->practice_id);
         
         $practiceName="";
         foreach($pracs as $prac){
         $practiceName = DB::table('practices')->whereIn('practice_id',$prac)->pluck('practice_name');
         $otherTeam=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->Where('team_slug','!=',$slug)->whereIn('practices.practice_id',$prac)->orderByRaw('team_position DESC')->get();
        $relatedArtcles=DB::table('teams')->join('articles','teams.team_id','=','articles.team_id')->Where('team_slug','=',$slug)->limit(2)->get();
      
        
  }
        if($relatedArtcles){
            $articles=$relatedArtcles;
        }
        else{
              $articles=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->join('articles','teams.team_id','=','articles.team_id')->whereIn('practices.practice_id',$prac)->limit(2)->get();

        }
         return view('front/detail',compact('personDetails','practiceName','otherTeam','articles', 'teamTitle'));


    }
    public function practice_detail($slug){

       $practice=DB::table('practices')->where('practice_slug' ,'=',$slug)->first();
       $pracTitle = strip_tags($practice->practice_title_text);
        $allPractices=DB::table('practices')->get();
        $otherTeam=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->where('practice_slug' ,'=',$slug)->orderByRaw('team_position DESC')->get();
      
        return view('front/practice_detail',compact('practice','pracTitle','allPractices','otherTeam'));

    }
    
    public function out_about($slug){
        $outAbout=DB::table('articles')->where('article_slug' ,'=',$slug)->first();
        return view('front/out_about',compact('outAbout'));
    }
    public function perspective(){
        $articles=DB::table('articles')->latest('created_at')->get();
        
     $publications =DB::table('categories')
     ->where('category_name','=','Publications')
     ->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
     ->get();

     $pressRelease=DB::table('categories')
     ->where('category_name','=','Press Release')
     ->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
     ->get();
     
     $outAndAbout=DB::table('categories')->where('category_name','=', 'Out and About')->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
     ->get();
        
    $videos=DB::table('categories')->where('category_name','=','Videos')
    ->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
    ->get();

        return view('front/perspective',compact('articles','videos','pressRelease','publications','articles','outAndAbout'));
    }
    public function article($slug){
        $article=DB::table('articles')->where('article_slug' ,'=',$slug)->latest('created_at')->first();
        $practices=DB::table('practices')->latest('created_at')->get();
        $otherTeam=DB::table('articles')->join('teams', 'teams.team_id', '=', 'articles.team_id')->join('practices','practices.practice_id','=','teams.practice_id')->where('article_slug' ,'=',$slug)->orderByRaw('team_position DESC')->get();
       
        return view('front/article',compact('article','practices','otherTeam'));

    }
    public function practice(){
         $practices=DB::table('practices')->get();
        return view('front/practice',compact('practices'));
    }
    public function about(){
        return view('front/about');
    }
    
    public function contact(){
        return view('front/contact');
    }

    public function apply_job(Request $request){
       $application = new Applications;
        $application->first_name = $request->first_name;
        $application->last_name = $request->last_name;
        $application->linkedin_url = $request->linkedin_url;
        $application->email=$request->email;
        $application->practice_id=$request->practice_id;
        $application->phone_number=$request->phone_number;
        $application->qualification=$request->qualification;
        $application->why_succeed=$request->why_succeed;
        $application->achievement=$request->achievement;
        $application->save();

    }

}
