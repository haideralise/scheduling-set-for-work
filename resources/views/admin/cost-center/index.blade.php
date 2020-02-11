@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <div class="clearfix">
    <h1 class="pull-left">Cost Center</h1>
    <h1 class="pull-right"><a href="{{route('cost-center.create')}}" class="btn btn-primary">Add Cost Center</a></h1>
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
                <th>Name</th>
                <th>Center Code</th>
                <th>Department</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cost_centers as $cost_center)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $cost_center->center_name }}</td>
                  <td>{{ $cost_center->center_code }}</td>
                  <td>{{ $cost_center->department->	department_title }}</td>
                  <td>
                    <a href="{{ route('cost-center.edit',$cost_center->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> |
                    <a href="javascript:;" onclick="confirmDelete('{{$cost_center->id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <form id="delete-cost_center-{{$cost_center->id}}" action="{{ route('cost-center.destroy',$cost_center->id) }}" method="POST" style="display: none;">
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
          document.getElementById('delete-cost_center-'+id).submit();
      }
  }
</script>
@stop