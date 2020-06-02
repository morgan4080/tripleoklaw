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
	            <h3 class="box-title">Dynamic Page</h3>
	          </div>
	    		@include('includes.messages')      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('pages.update',$page->id) }}" method="post">
	          {{ csrf_field() }}
	          {{ method_field('PUT') }}
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Page Name</label>
	                <input type="text" class="form-control" id="page_name" name="page_name" placeholder="Page Name" value="{{ $page->page_name }}">
	              </div>
	              
	              <div class="form-group">
	                <label for="name">Page Description</label>
	                <input type="text" class="form-control" id="page_description" name="page_description" placeholder="Page Description" value="{{ $page->page_description }}">
	              </div>

	             
	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('pages.index') }}' class="btn btn-warning">Back</a>
	            </div>
	            	
	            </div>
					
				</div>

	          </form>
	        </div>
	        
	        
	        <div class="box box-primary">
	          <div class="box-header with-border">
	            <h3 class="box-title">Page Sections</h3>
	            <a class='col-lg-offset-5 btn btn-success' href="{{ route('sections.create', [ 'page_id' => $page->id, 'page_name' => $page->page_name ]) }}">Add New</a>
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
                          <th>id</th>
                          <th>Section Name</th>
                          <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($sections as $section)
                          <tr>
                            <td>{{ $section->id }}</td>
                            <td>{{ $section->section_name }}</td>
                            <td><a href="{{ route('sections.edit',['id' => $section->id, 'page_name' => $page->page_name, 'page_id' => $page->id]) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            </tr>
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>id</th>
                          <th>Section Name</th>
                          <th>Edit</th>
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