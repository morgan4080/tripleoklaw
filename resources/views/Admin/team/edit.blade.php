@extends('Admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Add Team
      <small>Triple OK team Members</small>
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
            <h3 class="box-title">Input Fields</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('team.update',$team->team_id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}
            <div class="box-body">
              <div class="col-lg-6">
                  <input type="hidden" name="team_id" value="{{$team->team_id}}">
                <div class="form-group">
                  <label for="title">Name of the Person</label>
                  <input type="text" class="form-control" id="title" name="name" placeholder="Name" value="{{$team->team_name}}">
                </div>
                <div class="form-group">
                  <label for="title">Title of the Person</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$team->team_title}}">
                </div>
                 <div class="form-group">
                  <label for="title">Person Email Address</label>
                  <input type="text" class="form-control" id="title" name="email" placeholder="Email" value="{{$team->team_email}}">
                </div>
                 <div class="form-group">
                  <label for="title">Phone Number</label>
        <input type="text" class="form-control" id="phonenumber" name="phone_number" placeholder=""  value="{{$team->phone_number}}">
                </div>
                  <div class="form-group">
                  <label for="title">Linkedin</label>
                  <input type="text" class="form-control" id="phonenumber" name="linkedin" placeholder="Paste linkedin url" value="{{$team->team_linkedin}}">
                </div>
              
              </div>
              <div class="col-lg-6">
                 <div class="form-group">
                  <label for="title">twitter</label>
                  <input type="text" class="form-control" id="title" name="twitter" placeholder="Paste twitter link" value="{{$team->team_twitter}}">
                </div>
                <div class="form-group">
                  <label for="title">ASSOCIATIONS</label>
                  <input type="text" class="form-control" id="title" name="law_school" placeholder="e.g Advocate, Commissioner for Oaths and Notary Public" value="{{$team->team_law_school}}">
                </div>
                
                  <div class="form-group">
                  <label for="title">QUALIFICATIONS</label>
                  <input type="text" class="form-control" id="title" name="activities" placeholder="" value="{{$team->team_activities}}">
                </div>
              </div>

              <div class="col-lg-6">
                  <div class="form-group" style="margin-top:18px;">
                                <label>Select Practice Area</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="practice[]">
                                     <option value="{{$team->practice_id}}" selected>{{$team->practice_name}}</option>
                                  @foreach ($practices as $practice)
                                    <option value="{{ $practice->practice_id }}">{{ $practice->practice_name }}</option>
                                    
                                  @endforeach
                                </select>
                              </div>
                                <div class="form-group" style="margin-top:0px;">
                                <label>Select Rank</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="rank">
                                     <option value="{{$team->team_rank}}" selected>{{$team->team_rank}}</option>
                                    <option value="management">Operations</option>
                                     <option value="general">Lawyers</option>
                                    <option value="leadership">Leadership</option>
                                 
                                </select>
                              </div>
                           <div class="form-group" style="margin-top:0px;">
                                <label>Select Rank Position</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="position">
                                    <option value="{{$team->team_position}}" selected>{{$team->team_position}}</option>
                                    <option value="1">1</option>
                                     <option value="2">2</option>
                                    <option value="3">3</option>
                                     <option value="4">4</option>
                                    <option value="5">5</option>
                                     <option value="6">6</option>
                                     <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                     <option value="10">10</option>
                                 
                                </select>
                              </div>
                              <div class="form-group">
                                <div class="pull-right">
                                  <label for="image">Outer Image</label>
                                  <input type="file" name="image" id="image">
                                </div>
                                
                              </div>
                              <div class="form-group">
                                <div class="pull-right">
                                  <label for="inner image">Inner Image</label>
                                  <input type="file" name="inner_image" id="inner_image">
                                </div>
                                
                              </div>
                            
                             
                              
                            </div>
            </div>
            <!-- /.box-body -->
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Education
                 <small>Maximum number of words should be 30</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="education" style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor3">{!!html_entity_decode($team->education)!!}</textarea>
               </div>
             </div>
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">title text content
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="title_text" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{!!html_entity_decode($team->team_title_text)!!}</textarea>
               </div>
             </div>
              <div class="box">
             <div class="box-header">
               <h3 class="box-title">body text content
                 <small>Simple and fast</small>
               </h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="team_introduction" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor2">{!!html_entity_decode($team->team_introduction)!!}</textarea>
               </div>
             </div>
             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href="{{ route('team.index') }}" class="btn btn-warning">Back</a>
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
@section('footerSection')
<script src="{{ asset('admin/plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
       CKEDITOR.replace('editor2');
       CKEDITOR.replace('editor3');
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection