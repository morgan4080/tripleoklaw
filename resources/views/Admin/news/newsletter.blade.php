@extends('Admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/select2.min.css') }}">
<style>
    #spinner {
        display: none;
    }
    .reveal {
        display: block !important;
    }
    .success {
            color: #4CAF50;
            font-size: 14px;
            display: block;
            margin-top: auto;
            margin-bottom: auto;
            margin-left: 10px;
    }
</style>
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
          <form role="form" name="newsletter_form" method="post">
            {{ csrf_field() }}
            <div class="box-body">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="emailTitle">Email Title</label>
                  <input type="text" class="form-control" id="emailTitle" name="emailTitle" placeholder="TripleOKLaw LLP March News Letter">
                </div>
                
                <div class="form-group">
                  <label for="emailSubject">Email Subject</label>
                  <input type="text" class="form-control" id="emailSubject" name="emailSubject" placeholder="Alert">
                </div>
                
                <div class="form-group">
                  <label for="senderName">Sender Name</label>
                  <input type="text" class="form-control" id="senderName" name="senderName" placeholder="Jane Doe">
                </div>
              </div>
              <div class="col-lg-6">
                  <div class="form-group">
                    <label for="title">Email Sender & Reply Address</label>
                    <input type="email" class="form-control" id="title" name="emailSender" placeholder="info@tripleoklaw.com">
                  </div>
                  
                  <div class="form-group" style="max-height: 100px;">
                      <label for="ammendedList">Mailing List</label>
                        <textarea class="form-control" id="preview" name="mailingList" placeholder="host@example.co.ke,host@example.com,email,email.."></textarea>
                  </div>
                
                  <div class="form-group">
                    <div class="pull-left">
                      <label for="csv">Upload CSV Mailing List( * format 1 column, no title, unlimited rows)</label>
                      <input type="file" name="csv" id="csv">
                    </div>
                  </div>
                
              </div>
            </div>
            <!-- /.box-body -->
            
            <div class="box">
             <div class="box-header">
               <h3 class="box-title">Email Body</h3>
               <!-- tools box -->
               <div class="pull-right box-tools">
                 <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                   <i class="fa fa-minus"></i></button>
                 </div>
                 <!-- /. tools -->
               </div>
               <!-- /.box-header -->
               <div class="box-body pad">
                 <textarea name="emailBody" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
               </div>
             </div>

             <div style="display: flex;max-height: 58px;" id="box-footer" class="box-footer">
              <input type="submit" class="btn btn-primary">
              <svg id="spinner" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="shape-rendering: auto;height: 38px;" width="50px" height="100px" viewBox="0 0 100 100">
                <circle cx="50" cy="50" fill="none" stroke="#85a2b6" stroke-width="20" r="40" stroke-dasharray="23.561944901923447 9.853981633974483" transform="rotate(57.0895 50 50)">
                    <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
                </circle>
              </svg>
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
    var contactList = [];
    
  $(document).ready(function() {
    $(".select2").select2();
    document.getElementById('csv').addEventListener('change', function (e) {
      let files = e.target.files;
      const reader = new FileReader();
      reader.onload = function(evt) {
          contactList.push(evt.target.result);
          contactList = contactList[0].replace(/\n/ig, " ").split(" ").splice(0,contactList[0].replace(/\n/ig, " ").split(" ").length);
          
          document.getElementById("preview").innerText = `${contactList}`;
      };
      reader.readAsText(files[0]);
    }, false);
    $('form[name="newsletter_form"]').submit((event) => {
        event.preventDefault();
       document.querySelector("#box-footer > input").disabled = true;
       document.getElementById('spinner').classList.add("reveal");
        let data = {
            	mail_data: {
            		subjectEmail: event.target.emailSubject.value,
            		titleEmail: event.target.emailTitle.value,
            		senderEmail: event.target.emailSender.value,
            		replyToEmail: event.target.emailSender.value,
            		bodyEmail: CKEDITOR.instances.editor1.getData(),
            		senderName: event.target.senderName.value,
            		mailingList: event.target.mailingList.value.split(",")
            	}
        };
        
        console.log('data', data);
        
         axios({
            method: 'post',
            url: 'https://tripleoklaw.com/api/mghrm',
            headers: { 'content-type': 'application/json' },
            data: data
        })
        .then((res) => {
            console.log(res.data);
            if(res.status === 200) {
                console.log("success")
                document.getElementById('spinner').classList.remove("reveal");
                let node = document.createElement("span");
                let textnode = document.createTextNode("Success ✓");
                node.appendChild(textnode);
                node.classList.add("success");
                document.getElementById('box-footer').appendChild(node);
            } 
            if(res.status === 422) {
                console.log('res error');
            }
        })
        .catch((error) => {
            console.log(error);
        });
    });
  });
</script>
@endsection