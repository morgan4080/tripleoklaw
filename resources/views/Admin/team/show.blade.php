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
        
          <a class='col-lg-offset-5 btn btn-success' href="{{ route('team.create') }}">Add New</a>
      
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
                          <th>Image</th>
                          <th>Inner Image</th>
                           <th>Rank</th>
                          <th>Title</th>
                          <th>Edit</th>
                          <th>Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody class="row_position">
                        @foreach ($teams as $team)
                          <tr id="{{$team->team_id}}">
                            <td>{{ $team->team_name }}</td>
                            <td><image style="width:100px" src="{{asset('uploads/'.$team->team_image)}}"></td>
                                <td><image style="width:100px" src="{{asset('uploads/'.$team->inner_team_image)}}"></td>
                             <td>{{ $team->team_rank}}</td>
                             <td>{{ $team->team_title}}</td>
                            
                           
                              <td><a href="{{ route('team.edit',$team->team_id) }}"><span class="glyphicon glyphicon-edit"></span></a></td>
                          

                           
                            <td>
                              <form id="delete-form-{{ $team->team_id }}" method="post" action="{{ route('team.destroy',$team->team_id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $team->team_id }}').submit();
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
                          <th>Image</th>
                          <th>Inner Image</th>
                          <th>Rank</th>
                          <th>Title</th>
                          
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
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js" type="text/javascript"></script>
<script>
  $(function () {
    // $("#example1").DataTable();
    // jQuery.noConflict();
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

            url:"/updatePosition",

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