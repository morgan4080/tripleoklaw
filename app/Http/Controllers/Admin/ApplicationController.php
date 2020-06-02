<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Admin\Applications;

class ApplicationController extends Controller
{
    public function index(){
    	//i have to join with jobs using job_id
    	 $applications = DB::table('applications')->join('jobs','applications.job_id','=','jobs.job_id')->get();
        return view('Admin.application.show',compact('applications')); 

    }
    public function more($id){
       $application = DB::table('applications')->where('application_id','=',$id)->first();
       $job = DB::table('jobs')->where('job_id','=', $application->job_id)->first();
       
       return view('Admin.application.more',compact('application', 'job')); 
        
    }
    public function sender(Request $request) {
        return $request;
    }
}
