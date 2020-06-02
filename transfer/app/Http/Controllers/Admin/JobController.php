<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Jobs;

class JobController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    public function index()
    {
        $jobs = Jobs::all();
        return view('Admin.job.show',compact('jobs'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs =Jobs::all();
        return view('Admin.job.job',compact('jobs'));
   
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
             'type'=>'required',
            'body' => 'required',
           
            ]);
        
        $job = new Jobs;
        $job->job_title = $request->title;
         $job->job_type= $request->type;
        $job->job_body = $request->body;
        $job->save();

        return redirect(route('job.index'));
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
        $job = Jobs::where('job_id',$id)->first();
        return view('Admin.job.edit',compact('job'));
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
            'type'=>'required',
            'body' => 'required',
            ]);
        $job = Jobs::find($id);
      $job->job_type= $request->type;
       $job->job_title = $request->title;
       $job->job_body = $request->body;
        $job->save();

        return redirect(route('job.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jobs::where('job_id',$id)->delete();
        return redirect()->back();
    }
}
