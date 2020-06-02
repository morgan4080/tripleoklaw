@extends('Admin.layout.app')

@section('main-content')
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      Text Editors
	      <small>Advanced form element</small>
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li><a href="#">Forms</a></li>
	      <li class="active">Editors</li>
	    </ol>
	  </section>

	  <!-- Main content -->
	  <section class="content">
	    <div class="row">
	      <div class="col-md-12">
	        <!-- general form elements -->
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Edit content {{ $content->id }} for {{ $section_name }} on {{ $page_name }}</h3>
	          </div>
	    		@include('includes.messages')      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" name="myForm" action="{{ route('content.update', $content->id) }}" method="post" enctype="multipart/form-data">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	          <input type="hidden" id="page_id" name="page_id" value="{{ $page_id }}">
	          <input type="hidden" id="page_name" name="page_name" value="{{ $page_name }}">
	          <input type="hidden" id="section_id" name="section_id" value="{{ $section_id }}">
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Content Title</label>
	                <p><span style="cursor: pointer;text-decoration: underline;color: #0000ff;" onclick="insertMetachars('&lt;h1 class=\u0022'+ `heading` +'\u0022 &gt;\n','\n&lt;\/h1&gt;\n');">Heading Navy Blue</span> | <span style="cursor: pointer;text-decoration: underline;color: #0000ff;" onclick="insertMetachars('&lt;h1 class=\u0022'+ `heading-2` +'\u0022 &gt;\n','\n&lt;\/h1&gt;\n');">Heading Light Blue</span> | <span style="cursor: pointer;text-decoration: underline;color: #0000ff;" onclick='document.querySelector("#content_title").value = ""'>Clear</span></p>
	                <textarea rows="4" cols="90" class="form-control" id="content_title" name="content_title" placeholder="Content Title">{{ $content->content_title }}</textarea>
	              </div>
	              <div class="form-group">
	                <label for="name">Content Subtitle</label>
	                <textarea rows="4" cols="90" class="form-control" id="content_subtitle" name="content_subtitle" placeholder="Content Sub - Title">{{ $content->content_subtitle }}</textarea>
	              </div>
	              <div class="form-group">
	                <label for="name">Images</label>
	                <input type="file" class="form-control" name="image_array[]" id="image_array" multiple="">
	              </div>
	              <div class="form-group">
	                <label for="name">Videos</label>
	                <input type="file" class="form-control" name="video_array[]" id="video_array" multiple="">
	              </div>
	              <div class="form-group">
	                <label for="name">Link</label>
	                <input type="text" class="form-control" id="url" name="url" placeholder="https://example.com" value="{{ $content->url }}">
	              </div>
	              <div class="form-group">
	                <label for="name">Content Description One</label>
	                <textarea rows="8" cols="90" class="form-control" id="description_one" name="description_one" placeholder="Content Description">{{ $content->content_description_one }}</textarea>
	              </div>
	              <div class="form-group">
	                <label for="name">Content Description Two</label>
	                <textarea rows="8" cols="90" class="form-control" id="description_two" name="description_two" placeholder="Content Description">{{ $content->content_description_two }}</textarea>
	              </div>

    	            <div class="form-group">
    	              <button type="submit" class="btn btn-primary">Submit</button>
    	              <a href='{{ route('sections.edit', ['id' => $section_id, 'page_id' => $page_id, 'page_name' => $page_name ]) }}' class="btn btn-warning">Back</a>
    	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        <!-- /.box -->

	        
	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<script>
	    function insertMetachars(sStartTag, sEndTag) {
          var bDouble = arguments.length > 1, oMsgInput = document.myForm.content_title, nSelStart = oMsgInput.selectionStart, nSelEnd = oMsgInput.selectionEnd, sOldText = oMsgInput.value;
          oMsgInput.value = sOldText.substring(0, nSelStart) + (bDouble ? sStartTag + sOldText.substring(nSelStart, nSelEnd) + sEndTag : sStartTag) + sOldText.substring(nSelEnd);
          oMsgInput.setSelectionRange(bDouble || nSelStart === nSelEnd ? nSelStart + sStartTag.length : nSelStart, (bDouble ? nSelEnd : nSelStart) + sStartTag.length);
          oMsgInput.focus();
        }
	</script>
	<!-- /.content-wrapper -->
@endsection