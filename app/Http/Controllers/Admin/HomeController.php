<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Jobs;
use App\Admin\News;
use App\Admin\Articles;
use App\Admin\Team;
use App\Admin\Practice;
use DB;


class HomeController extends Controller
{
    public function index(){
    	$job = DB::table('jobs')->count();
    	$article = DB::table('articles')->count();
    	$practice= DB::table('practices')->count();
    	$team = DB::table('teams')->count();

        return view('Admin/home',compact('job','article','practice','team'));
    }

}
