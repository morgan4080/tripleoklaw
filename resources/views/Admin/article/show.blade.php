@extends('Admin.layout.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/datatables/dataTables.bootstrap.css') }}">
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
        
          <a class='col-lg-offset-5 btn btn-success' href="{{ route('article.create') }}">Add New</a>
      
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
                          <th>Title</th>
                          <th>Category</th>
                           <th>Post</th>
                          <th>Creatd At</th>
                          
                          <th>Edit</th>
                          
                           
                          <th>Delete</th>
                         
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($articles as $article)
                          <tr>
                           
                            <td>{{ $article->article_title }}</td>
                             <td>{{ $article->category_name }}</td>
                            <td>{!!html_entity_decode($article->article_body)!!}</td>
                           
                            <td>{{ $article->created_at }}</td>
                               <td><a href="{{route('article.edit',$article->article_slug)}}"><span class="glyphicon glyphicon-edit"></span></a></td>
                            <td>
                              <form id="delete-form-{{ $article->article_id }}" method="post" action="{{ route('article.destroy',$article->article_id) }}" style="display: none">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                              </form>
                              <a href="" onclick="
                              if(confirm('Are you sure, You Want to delete this?'))
                                  {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $article->article_id }}').submit();
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
                         
                          <th>Title</th>
                           <th>Category</th>
                          <th>Post</th>
                          <th>Creatd At</th>
                         
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
<script>
  $(function () {
    $("#example1").DataTable();
  });
</script>
@endsection