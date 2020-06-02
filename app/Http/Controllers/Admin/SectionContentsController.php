<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Admin\SectionContent;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Storage;

class SectionContentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $section_id = $request->input('section_id');
        $section_name = $request->input('section_name');
        $page_id = $request->input('page_id');
        $page_name = $request->input('page_name');
        
        return view('Admin.sectionContents.sectionContent',compact('section_id', 'section_name', 'page_id', 'page_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'section_id' => 'required',
            'content_title' => 'required',
        ]);
        $sectionContent = new SectionContent;
        $sectionContent->section_id = $request->section_id;
        $sectionContent->content_title = $request->content_title;
        if(isset($request->content_subtitle)):
            $sectionContent->content_subtitle = $request->content_subtitle;
        endif;
        if(isset($request->description_one)):
            $sectionContent->content_description_one = $request->description_one;
        endif;
        if(isset($request->description_two)):
            $sectionContent->content_description_two = $request->description_two;
        endif;
        if(isset($request->image_array)):
            $images = [];
            foreach ($request->image_array as $image):
                if($image->extension()):
                    if ('jpg' == $image->extension() || 'png' == $image->extension() || 'jpeg' == $image->extension()):
                        $name = $request->section_id.preg_replace('/\s/', '', $request->page_name).time().urlencode($image->getClientOriginalName());
                        $test = $image->move('images', $name);
                        $images[] = $test->getPathname();
                    endif;
                endif;
            endforeach;
            $sectionContent->image_array = json_encode($images);
        endif;
        if(isset($request->video_array)):
            $videos = [];
            foreach ($request->video_array as $video):
                if($video->extension()):
                    if ('webm' == $video->extension() || 'mp4' == $video->extension()):
                        $name = $request->section_id.preg_replace('/\s/', '', $request->page_name).time().urlencode($video->getClientOriginalName());
                        $dest = $video->move('videos', $name);
                        $videos[] = $dest->getPathname();
                    endif;
                endif;
            endforeach;
            $sectionContent->video_array = json_encode($videos);
        endif;
        if(isset($request->url)):
            $sectionContent->url = $request->url;
        endif;
        
        $sectionContent->save();
        // dd(route('pages.edit', ['id' => $request->page_id]));
        return redirect(route('sections.edit',['id' => $request->section_id, 'page_name' => $request->page_name, 'page_id' => $request->page_id]));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
        $content = SectionContent::where('id', $id)->first();
        $section_id = $request->input('section_id');
        $section_name = $request->input('section_name');
        $page_id = $request->input('page_id');
        $page_name = $request->input('page_name');
        
        return view('Admin.sectionContents.edit',compact('content', 'section_id', 'section_name', 'page_id', 'page_name'));
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
            'section_id' => 'required',
            'content_title' => 'required',
        ]);
        
        $sectionContent = SectionContent::find($id);
        $sectionContent->section_id = $request->section_id;
        $sectionContent->content_title = $request->content_title;
        if(isset($request->content_subtitle)):
            $sectionContent->content_subtitle = $request->content_subtitle;
        endif;
        if(isset($request->description_one)):
            $sectionContent->content_description_one = $request->description_one;
        endif;
        if(isset($request->description_two)):
            $sectionContent->content_description_two = $request->description_two;
        endif;
        if(isset($request->image_array)):
            $images = [];
            foreach ($request->image_array as $image):
                if($image->extension()):
                    if ('jpg' == $image->extension() || 'png' == $image->extension() || 'jpeg' == $image->extension()):
                        $name = $request->section_id.preg_replace('/\s/', '', $request->page_name).time().urlencode($image->getClientOriginalName());
                        $test = $image->move('images', $name);
                        $images[] = $test->getPathname();
                    endif;
                endif;
            endforeach;
            $sectionContent->image_array = json_encode($images);
        endif;
        if(isset($request->video_array)):
            $videos = [];
            foreach ($request->video_array as $video):
                if($video->extension()):
                    if ('webm' == $video->extension() || 'mp4' == $video->extension()):
                        $name = $request->section_id.preg_replace('/\s/', '', $request->page_name).time().urlencode($video->getClientOriginalName());
                        $dest = $video->move('videos', $name);
                        $videos[] = $dest->getPathname();
                    endif;
                endif;
            endforeach;
            $sectionContent->video_array = json_encode($videos);
        endif;
        if(isset($request->url)):
            $sectionContent->url = $request->url;
        endif;
        
        $sectionContent->save();
        
        return redirect(route('sections.edit',['id' => $request->section_id, 'page_name' => $request->page_name, 'page_id' => $request->page_id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        SectionContent::where('id', $id)->delete();
        $section_id = $request->input('section_id');
        $page_id = $request->input('page_id');
        $page_name = $request->input('page_name');
        
        return redirect(route('sections.edit',['id' => $section_id, 'page_name' => $page_name, 'page_id' => $page_id]));
    }
}