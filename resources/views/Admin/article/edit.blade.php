@extends('Admin.layout.app')

@section('headSection')
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
    <script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
    <meta name="connector-route" content="{{ route('ckfinder_connector') }}">
    <meta name="browser-route" content="{{ route('ckfinder_browser') }}">
    @include('ckfinder::setup')
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
          <form role="form" action="{{ route('article.update',$article->article_id) }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
             {{ method_field('PATCH') }}
           <div class="box-body">
              <div class="col-lg-8">
                   <input type="hidden" name="article_id" value="{{$article->article_id}}">
                <div class="form-group">
                  <label for="title">Article Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="{{$article->article_title}}">
                </div>
                <div class="form-group" style="margin-top:18px;">
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="category_id">
                                  <label>Select Category</label>
                                  <option value="{{$article->category_id}}" selected>{{$article->category_name }}</option>
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                               <div class="form-group">
                  <label for="title">Video url</label>
                  <input type="text" class="form-control" id="title" name="video" placeholder="place enter videos url" value="{{$article->article_video_url}}">
                </div>
                              <div class="form-group" style="margin-top:18px;">
                                <label>Select Writter</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="team_id[]">
                                 @foreach ($allTeams as $t)<option value="{{$article->team_id }}" selected>{{$t->team_name }}</option>@endforeach
                                  @foreach ($teams as $team)
                                    <option value="{{$team->team_id }}">{{$team->team_name }}</option>
                                  @endforeach
                                </select>
                              </div>
              </div>
              <div class="col-lg-6">
                            <br>
                              <div class="form-group">
                                <div class="pull-right">
                                  <label for="image">File input</label>
                                  <input type="file" name="image" id="image">
                                </div>
                                <div class="pull-right">
                                 <label for="images">Out and About File</label>
                                 <input type="file" name="images[]" id="images" multiple>
                             </div>

                              </div>
                              <br>

                            </div>

            </div>
            <!-- /.box-body -->

            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Write Article Body Here
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
                 <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1">{{$article->article_body}}</textarea>
               </div>
             </div>

             <div class="box-footer">
              <input type="submit" class="btn btn-primary">
              <a href='{{ route('article.index') }}' class="btn btn-warning">Back</a>
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
<script>
    $(function () {

        function getMeta(metaName) {
            const metas = document.getElementsByTagName('meta');
            for (let i = 0; i < metas.length; i++) {
                if (metas[i].getAttribute('name') === metaName) {
                    return metas[i].getAttribute('content');
                }
            }
            return '';
        }
          // Replace the <textarea id="editor1"> with a CKEditor
          // instance, using default configuration.
        CKEDITOR.replace('editor1', {
            extraPlugins: 'devtools',
            // Use named CKFinder browser route
            filebrowserBrowseUrl: getMeta('browser-route'),
            // Use named CKFinder connector route
            filebrowserUploadUrl: `${getMeta('connector-route')}?command=QuickUpload&type=Files`
        });
    });
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();
  });
</script>
@endsection
