<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin\Jobs;
use Illuminate\Support\Facades\DB;

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
        if (isset($request['questions']) && isset($request['specialty']) && isset($request['qualification'])):
            // all questions, specialty, qualification
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->questions_array = json_encode($request->questions);
                $job->specialty = json_encode($request->specialty);
                $job->qualification = json_encode($request->qualification);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (isset($request['questions'])  && !isset($request['specialty']) && !isset($request['qualification'])):
            // only questions
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->questions_array = json_encode($request->questions);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (!isset($request['questions'])  && isset($request['specialty']) && isset($request['qualification'])):
            // specialty and qualification
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->specialty = json_encode($request->specialty);
                $job->qualification = json_encode($request->qualification);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (isset($request['questions'])  && isset($request['specialty']) && !isset($request['qualification'])):
            // questions and specialty
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->questions_array = json_encode($request->questions);
                $job->specialty = json_encode($request->specialty);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (isset($request['questions'])  && !isset($request['specialty']) && isset($request['qualification'])):
            // questions and qualification
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->questions_array = json_encode($request->questions);
                $job->qualification = json_encode($request->qualification);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (!isset($request['questions'])  && !isset($request['specialty']) && isset($request['qualification'])):
            // only qualification
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->qualification = json_encode($request->qualification);
                $job->save();
                return redirect(route('job.index'));
            endif;
        elseif (!isset($request['questions'])  && isset($request['specialty']) && !isset($request['qualification'])):
            // only specialty
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, questions_array = :specificQuestions, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificQuestions' => json_encode($request->questions), 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                $job->specialty = json_encode($request->specialty);
                $job->save();
                return redirect(route('job.index'));
            endif;
        else:
            if (isset($request->job_id)):
                $results = DB::update('update jobs set job_type = :specificType, job_title = :specificTitle, job_body = :specificBody where job_id = :specificId', ['specificId' => $request->job_id, 'specificTitle' => $request->title , 'specificType' => $request->type, 'specificBody' => $request->body]);
                
                if(0 == $results):
                    return redirect(route('job.index'));
                else:
                    return redirect(route('job.edit'));
                endif;
            else:
                $job = new Jobs;
                $job->job_title = $request->title;
                $job->job_type= $request->type;
                $job->job_body = $request->body;
                // $job->questions_array = json_encode($request->questions);
                $job->save();
                return redirect(route('job.index'));
            endif;
        endif;
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
    public function update(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'type'=>'required',
            'body' => 'required',
            ]);
        $job = Jobs::find($request->job_id);
      $job->job_type= $request->type;
       $job->job_title = $request->title;
       if (isset($request['questions'])):
            $job->questions_array = json_encode($request->questions);
        endif;
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
