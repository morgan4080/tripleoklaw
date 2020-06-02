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
	            <h3 class="box-title">{{ $page_name }} - {{ $section->section_name }}</h3>
	          </div>
	    		@include('includes.messages')      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('sections.update',$section->id) }}" method="post">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Section Name</label>
	                <input type="text" class="form-control" id="section_name" name="section_name" placeholder="Section Name" value="{{ $section->section_name }}">
	              </div>
	              
	              <div class="form-group">
	                <label for="name">Section Description</label>
	                <input type="text" class="form-control" id="page_description" name="section_description" placeholder="Section Description" value="{{ $section->description_one }}">
	              </div>

	             
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('pages.edit', $page_id) }}' class="btn btn-warning">Back</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        
	        
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Section Content</h3>
	            <a class='col-lg-offset-5 btn btn-success' href="{{ route('content.create', [ 'section_id' => $section->id, 'section_name' => $section->section_name, 'page_id' => $page_id, 'page_name' => $page_name ]) }}">Add New</a>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
	          </div>
	    		      
	          <!-- /.box-header -->
	            <div class="box-body">
    	            <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Section Content Title</th>
                          <th>Content Description</th>
                          <th>Edit</th>
                          <th>Del</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($section_contents as $section_content)
                          <tr>
                            <td>{!!html_entity_decode( $section_content->content_title )!!}</td>
                            <td>{{ $section_content->content_subtitle }}</td>
                            <td><a href="{{ route('content.edit', [ 'id' => $section_content->id, 'section_id' => $section->id, 'section_name' => $section->section_name, 'page_id' => $page_id, 'page_name' => $page_name ]) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td>
                              <form id="delete-form-{{ $section_content->id }}" method="post" action="{{ route('content.destroy', [ 'id' => $section_content->id, 'section_id' => $section->id, 'section_name' => $section->section_name, 'page_id' => $page_id, 'page_name' => $page_name ]) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $section_content->id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                            </tr>
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>Section Content Title</th>
                          <th>Content Description</th>
                          <th>Edit</th>
                          <th>Del</th>
                        </tr>
                        </tfoot>
                      </table>
				</div>
	        </div>
	        
	        
	        <!-- /.box -->

	        
	      </div>
	      <!-- /.col-->
	    </div>
	    <!-- ./row -->
	  </section>
	  <!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
@endsection