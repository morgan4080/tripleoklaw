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
	            <h3 class="box-title">Create new section for {{ $page_name }}</h3>
	          </div>
	    		@include('includes.messages')      
	          <!-- /.box-header -->
	          <!-- form start -->
	          <form role="form" action="{{ route('sections.store') }}" method="post">
	          {{ csrf_field() }}
	          <input type="hidden" id="page_id" name="page_id" value="{{ $page_id }}">
	          <input type="hidden" id="page_name" name="page_name" value="{{ $page_name }}">
	            <div class="box-body">
	            <div class="col-lg-offset-3 col-lg-6">
	              <div class="form-group">
	                <label for="name">Section Name</label>
	                <input type="text" class="form-control" id="section_name" name="section_name" placeholder="Section Name">
	              </div>
	              <div class="form-group">
	                <label for="name">Section Description One</label>
	                <input type="text" class="form-control" id="section_description" name="description_one" placeholder="Section Description">
	              </div>
	              
	              <div class="form-group">
	                <label for="name">Section Description Two</label>
	                <input type="text" class="form-control" id="section_description_two" name="description_two" placeholder="Section Description">
	              </div>

	            <div class="form-group">
	              <button type="submit" class="btn btn-primary">Submit</button>
	              <a href='{{ route('pages.index') }}' class="btn btn-warning">Back</a>
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
	<!-- /.content-wrapper -->
@endsection