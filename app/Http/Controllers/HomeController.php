<?php

namespace App\Http\Controllers;
use App\Admin\Jobs;
use DB;
use Illuminate\Support\Facades\Storage;
use App\Admin\Team;
use App\Admin\Applications;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        /*$articles=DB::table('articles')->limit(2)->get();*/
        $articles=DB::table('categories')->where('category_name','=','Publications')->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')->limit(2)->get();
         /*$asideArticles=DB::table('articles')->limit(3)->latest('created_at')->get();*/
        $asideArticles=DB::table('categories')->where('category_name','=','Press Release')->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')->limit(2)->get();
        $practices=DB::table('practices')->get();
        $sections=DB::table('pages')->where('page_name','=','Home Page')->join('sections', 'pages.id', '=', 'sections.page_id')->join('section_contents', 'sections.id', '=', 'section_contents.section_id')->get()->toArray();
        $sections = array_reduce($sections, function($groups, $obj) {
            try {
                $key = $obj->section_name;
                
                if(!isset($groups[$key])):
                    $groups[$key] = [];
                endif;
                
                $groups[$key][] = $obj;
                
            } catch(Exception $e) {
                dd('Caught exception: ',  $e->getMessage(), "\n");
            }
            
            return $groups;
        });
        
        return view('front/home',compact('articles','asideArticles','practices','sections'));
    }
    public function join(){
        $jobs =Jobs::all();
        $jobs = $jobs->reverse();
        $practices=DB::table('practices')->get();
        // dd($jobs);
        return view('front/join',compact('jobs','practices'));
    }
    public function team(){
    	$leadership=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id')
         ->where('team_rank', '=','leadership')->orderBy('team_position', 'ASC')->get();
    	$management=DB::table('teams')
         ->where('team_rank', '=','management')->orderBy('team_position', 'ASC')->get();
         foreach($management as $manage){
             $manage->practice_name="Operations";
         }
         
    	$allPeople=DB::table('practices')
         ->join('teams', 'practices.practice_id', '=', 'teams.practice_id') ->where('team_rank', '=','general')->orderBy('team_position','ASC')->get();
    	return view('front/team',compact('leadership','management','allPeople'));
    

    }
    public function team_detail($slug){
        
    	$personDetails=$team =DB::table('teams')->where('team_slug',$slug)->first();
       
    	if (empty($personDetails->team_linkedin==0)) {
    	   $personDetails->team_linkedin="#";
    	}
    	if(empty($personDetails->team_email)){
    	    $personDetails->team_email="#";
    	}
    	if(empty($personDetails->team_twitter)){
    	    $personDetails->team_twitter="#";
    	}
    	if($personDetails->phone_number == 0){
    	    $personDetails->phone_number="#";
    	}
    	$teamTitle = strip_tags($personDetails->team_title_text);
        $practice_id[]="";
        $pracs[]=preg_split ("/\,/",$personDetails->practice_id);
        $practiceName="";
        foreach($pracs as $prac) {
            $practiceName = DB::table('practices')->whereIn('practice_id',$pracs)->pluck('practice_name');
            $otherTeam=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->Where('team_slug','!=',$slug)->whereIn('practices.practice_id',$prac)->orderBy('team_position','ASC')->get();
            $relatedArtcles = DB::table('categories')->where('category_name','=','Publications')->join('articles', 'categories.category_id', '=', 'articles.category_id')->join('teams', 'articles.team_id','=', 'teams.team_id')->Where('team_slug','=',$slug)->latest('articles.created_at')->limit(2)->get();
            
            /*$relatedArtcles=DB::table('teams')->join('articles','teams.team_id','=','articles.team_id')->Where('team_slug','=',$slug)->join('categories', 'articles.category_id', '=', 'categories.category_id')->where('category_name','=','Publications')->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')->limit(2)->get();*/
            /* $relatedArtcles=DB::table('teams')->join('articles','teams.team_id','=','articles.team_id')->Where('team_slug','=',$slug)->latest('articles.created_at')->limit(2)->get();*/
        }
        
        if($relatedArtcles){
            $articles=$relatedArtcles;
        } else {
              $articles=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->join('articles','teams.team_id','=','articles.team_id')->whereIn('practices.practice_id',$prac)->latest('articles.created_at')->limit(2)->get();

        }
        
         return view('front/detail',compact('personDetails','practiceName','otherTeam','articles', 'teamTitle'));


    }
    public function practice_detail($slug){

       $practice=DB::table('practices')->where('practice_slug' ,'=',$slug)->first();
       $pracTitle = strip_tags($practice->practice_title_text);
       //$allPractices=DB::table('pracategories')->join('practices', 'pracategories.pracategory_id', '=', 'practices.pracategory_id')->where('practice_slug' ,'=',$slug)->get();
       $pracs[]=explode(",",$practice->pracategory_id);
      // $prac=[];
       foreach($pracs as $id){
            $allPractices = DB::table('pracategories')
                    ->whereIn('pracategory_id', $id)
                    ->get();
          }
       
       
       $otherTeam=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->where('practice_slug' ,'=',$slug)->orderBy('team_position','ASC')->get();
      
        return view('front/practice_detail',compact('practice','pracTitle','allPractices','otherTeam'));

    }
    public function uploadDocs(Request $request)
    {
        if (isset($request['particulars'])):
            if ($request->hasFile('particulars')):
                $particularsData = $request->file('particulars');
                if (!empty($particularsData)):
                    if (is_array($particularsData)):
                        foreach($particularsData as $dat):
                                if ('pdf' == $dat->extension()):
                                    $name = time().$dat->getClientOriginalName();
                                    $dat->move('publications', $name);
                                    $stor[] = "https://tripleoklaw.com/publications/".rawurlencode($name);
                                else:
                                    return json_encode("File Extension Not Permitted");
                                endif;
                        endforeach;
                    endif;
                endif;
            endif;
        else:
            return 403;
        endif;
        
        return json_encode($stor);
    }
    public function getApplication(Request $request){
        $email = Applications::where('email', '=', $request->email)
                                ->where('job_id', $request->job_id)
                                ->first();
        $stor = [];
        if ($email === null) {
            $application = new Applications;
            $application->first_name=$request->first_name;
            $application->job_id=$request->job_id;
            $application->last_name= $request->last_name;
            $application->linkedin_url=$request->linkedin_url;
            $application->email=$request->email;
            $application->practice_id=$request->practice;
            $application->phone_number=$request->phone;
            if (isset($request->answers)):
                $application->answers_array=json_encode($request->answers);
            endif;
            if (isset($request['particulars'])):
                if ($request->hasFile('particulars')):
                    $particularsData = $request->file('particulars');
                    if (!empty($particularsData)):
                        if (is_array($particularsData)):
                            foreach($particularsData as $dat):
                                    if ('pdf' == $dat->extension()):
                                        $name = strstr($request->email, '@', true).time().$dat->getClientOriginalName();
                                        $dat->move('applications', $name);
                                        $stor[] = $name;
                                    else:
                                        return json_encode("File Extension Not Permitted");
                                    endif;
                            endforeach;
                            $application->attachment_array=json_encode($stor);
                        endif;
                    endif;
                endif;
            else:
                return 403;
            endif;
            $application->qualification=$request->qualification;
            $application->plan_text=$request->plan;
            $application->reference_text=$request->reference;
            $application->achievement_text=$request->achievements;
            $application->save();
            return json_encode("application Successful");
        }
        else{
            return json_encode("you already applied for this job");
        }
    }
    public function out_about($slug){
        $outAbout=DB::table('articles')->where('article_slug' ,'=',$slug)->first();
        return view('front/out_about',compact('outAbout'));
    }
    public function perspective(){
        $articles=DB::table('categories')
     ->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
     ->get();
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
    $legalAlerts=DB::table('categories')
     ->where('category_name','=','LegalAlerts')
     ->join('articles', 'categories.category_id', '=', 'articles.category_id')->latest('articles.created_at')
     ->get();

        return view('front/perspective',compact('articles','videos','pressRelease','publications','articles','outAndAbout', 'legalAlerts'));
    }
    public function article($slug) {
        $article=DB::table('articles')->where('article_slug' ,'=',$slug)->latest('updated_at')->first();
        $practices=DB::table('practices')->latest('updated_at')->get();
        
        $teamIds[] = explode(",",$article->team_id);
        $otherTeam="";
        foreach($teamIds as $id):
        $otherTeam = DB::table('teams')
                ->whereIn('team_id', $id)
                ->get();
        endforeach;
        return view('front/article',compact('article','practices','otherTeam'));

    }
    public function practice(){
         $practices=DB::table('practices')->Where('practice_name','!=','management')->latest()->get();
         
         
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
    public function pracategory_detail($slug){
        $pracategory=DB::table('pracategories')->where('pracategory_slug' ,'=',$slug)->first();
        //dd($pracategory);
        $practice=DB::table('practices')->where('pracategory_id', 'LIKE', '%'.$pracategory->pracategory_id.'%')->first();
        
       $id=$practice->pracategory_id;
       
       $pracs=[];
       if(!empty($id)){
            $pracs=explode(",",$id);
            
       }
       
      // $prac=[];
      $relatedPracategories ="";
      if(!empty($pracs)){
          
            $relatedPracategories = DB::table('pracategories')
                    ->whereIn('pracategory_id', $pracs)
                    ->get();
        
      }
          else
          {
              $relatedPracategories ="no content";
              
          }
      
             $otherTeam=DB::table('practices')->join('teams', 'practices.practice_id', '=', 'teams.practice_id')->where('teams.practice_id' ,'=',$practice->practice_id)->orderBy('team_position','ASC')->get();
             
        return view('front/subpractice_detail',compact('relatedPracategories','pracategory','otherTeam','practice'));
    
    }

}
