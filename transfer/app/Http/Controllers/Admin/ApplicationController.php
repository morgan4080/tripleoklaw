<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ApplicationController extends Controller
{
    public function index(){
    	//i have to join with jobs using job_id
    	 $joins = DB::table('joins')->get();
    	 echo "under development";
    	 foreach($joins as $join){
    	 	var_dump($join->join_first_name);

    	 }
    	 
    	 exit;
        return view('Admin.application.show',compact('joins')); 

    }
}
