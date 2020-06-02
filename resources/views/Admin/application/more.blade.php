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
      {{ $application->first_name}} {{$application->last_name}}
    </h1>
    <h5>
        {{ $job->job_title }}
    </h5>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Editors</li>
    </ol>
  </section>

<div class="container">
    <div class="row">
    <div class="col-lg-8 col-lg-offset-2">
  <h2>Linkedin</h2>
  <div class="well well-sm">{{$application->linkedin_url}}</div>
  <h2>My achievement</h2>
  <div class="well well-lg">{{$application->achievement_text}}</div>
  <h2>My plan</h2>
  <div class="well well-lg">{{$application->plan_text}}</div>
  <h2>Answers</h2>
  @if($application->answers_array)
  @php 
    $arrayAnswers = json_decode($application->answers_array);
    $arrayQuestions = json_decode($job->questions_array);
    
    $arr = array(
            "questions" => $arrayQuestions,
            "answers" => $arrayAnswers
            );
  @endphp
  <div class="well well-lg">
      @for($i=0; $i < count($arr["questions"]); $i++)
        <p><strong>Question:</strong> {{$arr["questions"][$i]}} <br> <strong>Answer:</strong> {{$arr["answers"][$i]}} </p>
      @endfor
  </div>
  @endif
  <h2>Other Detials</h2>
  <div class="well well-lg">
      <p>
          <strong>Job Posting Reference:</strong>
          {{$application->reference_text}}
      </p>
      <h5><strong>Downloads</strong></h5>
      <p>
          @php
            $arr2 = json_decode($application->attachment_array);
          @endphp
          @foreach($arr2 as $download)
            <a href="https://tripleoklaw.com/applications/{{ rawurlencode($download) }}" target="_blank"> Download >></a><br>
          @endforeach
      </p>
  </div>
  <div style="padding-bottom:20px;text-align:right;">
    <button type="button" onclick="sendToHr()" class="btn btn-primary">SEND TO HR</button>
  </div>
</div>
</div>
</div>
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
       CKEDITOR.replace('editor2');
       CKEDITOR.replace('editor3');
    });
</script>
<script>
  var formData = new FormData();
  function sendToHr(){
      console.log("sending to HR");
      formData.append('position', "{{ $job->job_title }}");
      formData.append('first_name', "{{ $application->first_name }}");
      formData.append('last_name', "{{ $application->last_name }}");
      formData.append('linkedin', "{{ $application->linkedin_url }}");
      formData.append('achievements', "{{ $application->achievement_text }}");
      formData.append('plans', "{{ $application->plan_text }}");
      formData.append('references', "{{ $application->reference_text }}");
      formData.append('questionsAnswered', document.querySelector("body > div > div > div > div > div > div:nth-child(8)").innerHTML);
    axios({
        method: 'post',
        url: '/admin/more/dosender',
        headers: { 'content-type': 'multipart/form-data' },
        data: formData
    })
    .then((res) => {
        console.log(res.data);
        if(res.status === 200) {
            console.log("accepted");
        } else {
            console.log("failed");
        }
    })
    .catch((error) => {
        console.log(error);
    });
  }
  $(document).ready(function() {
    $(".select2").select2();
    
  });
</script>
@endsection