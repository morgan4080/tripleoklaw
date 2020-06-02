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
            <h3 class="box-title">New Publication</h3>
          </div>
          @include('includes.messages')
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="title">Article Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group" style="margin-top:18px;">
                                <label>Select Category</label>
            <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="category_id" id="cate">
                                  @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
                                  @endforeach
                                </select>
                              </div>
                               <div class="form-group" id="video">
                  <label for="title">Video url</label>
                  <input type="text" class="form-control"  name="video" placeholder="copy video url if category is video">
                </div>
                 <div class="form-group" id="link">
                  <label for="title">link url</label>
                  <input type="text" class="form-control"  name="link" placeholder="place enter url link if category is press release">
                </div>
                <div class="form-group" id="link">
                  <label for="title">Article Excerpt</label>
                  <input type="text" class="form-control"  name="excerpt" placeholder="short description">
                </div>
                              <div class="form-group" style="margin-top:18px;">
                                <label>Select Author</label>
                                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" name="team_id[]">
                                  @foreach ($teams as $team)
                                    <option value="{{ $team->team_id }}">{{ $team->team_name }}</option>
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
                        <div class="pull-right" style="margin-top: 10px;">
                            <label for="particulars" class="field-label">Upload Doc(pdf*)</label>
                            <input type="file" class="user-input w-input" name="particulars[]" onchange="handleFiles(this.files)" id="particulars" multiple>
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
                 <textarea name="body" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
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
<script src="{{  asset('admin/ckeditor/ckeditor.js') }}"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    });
    var formData = new FormData();
    var sessionFiles;
    function handleFiles(files) {
        sessionFiles = files;
        if (sessionFiles === undefined || sessionFiles.length == 0) {
            console.log("No attached pdfs");
            $("#particulars").after(`<span class="err2" style="font-size: 10px;color: red;margin-top: -10px;">No attached PDFS</span>`);
            return
        } else {
            for (var i = 0; i < sessionFiles.length; i++) {
                let file = sessionFiles[i];
                if (file.type === 'application/pdf') {
                    formData.append('particulars[]', file);
                } else {
                    console.log("Not PDF");
                    $("#particulars").after(`<span class="err2" style="font-size: 10px;color: red;margin-top: -10px;">Not a PDF</span>`);
                    return
                }
            }
            //  &amp;hl=en_US&amp;embedded=true&amp;wmode=transparent
            console.log("doing axios");
            axios({
                method: 'post',
                url: 'https://tripleoklaw.com/uploader',
                headers: { 'content-type': 'multipart/form-data' },
                data: formData
            })
            .then((res) => {
                console.log(res.data);
                if(res.status === 200) {
                    console.log("success");
                    res.data.forEach((item, index) => {
                        let sampleHtm = CKEDITOR.dom.element.createFromHtml(`<p><iframe class="gde-frame test" scrolling="no" src="https://tripleoklaw.com/pdfjs/web/viewer.html?file=${item}" style="width:100%; height:500px; border: none;"></iframe></p>`);
                        CKEDITOR.instances.editor1.insertElement(sampleHtm);
                    });
                } 
                if(res.status === 422) {
                    console.log('res error');
                }
            })
            .catch((error) => {
                console.log(error);
            });
        }
    }
</script>

@endsection