@extends('Admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
<link href="https://code.jquery.com/ui/1.12.0/themes/blitzer/jquery-ui.css" rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Blank page
      <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Examples</a></li>
      <li class="active">Blank page</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Title</h3>
        
          <a class='col-lg-offset-5 btn btn-success' href="{{ route('practice.create') }}">Add New</a>
      
        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Name</th>
                           <th>image</th>
                          <th>introduction</th>
                            <th>Body</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody class="row_position">
                        @foreach ($practices as $practice)
                          <tr id="{{$practice->practice_id}}">
                            <td>{{ $practice->practice_name }}</td>
                            <td><image style="width:100px" src="{{asset('uploads/'.$practice->practice_image)}}"></td>
                             <td>{!!html_entity_decode($practice->practice_introduction)!!}</td>
                           <td>{!!html_entity_decode($practice->practice_body)!!}</td>
                              <td><a href="{{ route('practice.edit',$practice->practice_id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                          

                           
                            <td>
                              <form id="delete-form-{{ $practice->practice_id }}" method="post" action="{{ route('practice.destroy',$practice->practice_id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $practice->practice_id }}').submit();
                                  }
                                  else{
                                    event.preventDefault();
                                  }" ><span class="glyphicon glyphicon-trash"></span></a>
                            </td>
                         
                          </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                         
                        <th>Name</th>
                           <th>image</th>
                          <th>introduction</th>
                            <th>Body</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                        </tfoot>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        Footer
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('footerSection')
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script>
  $(function () {
    // $("#example1").DataTable();
    $( ".row_position" ).sortable({

          delay: 150,

          stop: function() {

              var selectedData = new Array();

              $('.row_position>tr').each(function() {

                  selectedData.push($(this).attr("id"));

              });

              updateOrder(selectedData);

          }

      });
      
      function updateOrder(data) {
        //   $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        $.ajax({

            url:"/updatePracticePosition",

            type:'post',

            data:{
                "_token": "{{ csrf_token() }}",
                "position":data
                
            },

            success:function(){

            }

        })

    }
  });
</script>
@endsection