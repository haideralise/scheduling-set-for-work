@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <div class="clearfix">
    <h1 class="pull-left">Positions</h1>
    <h1 class="pull-right"><a href="{{route('position.create')}}" class="btn btn-primary">Add Position</a></h1>
    </div>
@stop
@section('content')
  <div class="row mt-2">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif     
        </div>
        <div class="box-body">
          <table id="laravel_datatable" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Job Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($positions as $position)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $position->jobdec_id }}</td>
                  <td>{{ $position->start_date }}</td>
                  <td>
                    <a href="{{ route('position.edit',$position->epa_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> |
                    <a href="javascript:;" onclick="confirmDelete('{{$position->epa_id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <form id="delete-position-{{$position->epa_id}}" action="{{ route('position.destroy',$position->epa_id) }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
@stop
@section('js')
<script>
  $(document).ready( function () {
    $('#laravel_datatable').DataTable();
  });
  function confirmDelete(id){
      let choice = confirm("Are you sure. You want to delete this record ?");
      if(choice){
          document.getElementById('delete-position-'+id).submit();
      }
  }
</script>
@stop