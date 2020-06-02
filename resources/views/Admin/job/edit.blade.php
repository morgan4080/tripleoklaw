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
            <h3 class="box-title">Titles</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('job.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             {{ method_field('POST') }}
             
            <input type="hidden" value="{{$job->job_id}}" name="job_id">
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Job Title</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{$job->job_title}}" placeholder="Title">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Job Type</label>
                  <input type="text" class="form-control" id="title" name="type" value="{{$job->job_type}}" placeholder="Title">
                </div>
              </div>
              <?php $question = $job->questions_array;?>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Question 1</label>
                  <input type="text" class="form-control" id="question1" name="questions[]" placeholder="some question">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Question 2</label>
                  <input type="text" class="form-control" id="question2" name="questions[]" placeholder="some question">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Question 3</label>
                  <input type="text" class="form-control" id="question3" name="questions[]" placeholder="some question">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Question 4</label>
                  <input type="text" class="form-control" id="question4" name="questions[]" placeholder="some question">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Question 5</label>
                  <input type="text" class="form-control" id="question5" name="questions[]" placeholder="some question">
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Job Body Here
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
                 <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$job->job_body}}</textarea>
               </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('job.index') }}' class="btn btn-warning">Back</a>
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
    });
</script>
<script>
    $(document).ready(function() {
        $(".select2").select2();
        var question = <?php echo $question?>;
        
        if(question.length > 0) {
            let count = 1;
            question.forEach(x => {
               document.querySelector(`#question${count}`).value = x;
               count++;
            });
        }
    });
</script>
@endsection