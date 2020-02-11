@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <div class="clearfix">
    <h1 class="pull-left">Shifts</h1>
    <h1 class="pull-right"><a href="{{route('shift.create')}}" class="btn btn-primary">Add shift</a></h1>
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
                <th>Shift Name</th>
                <th>Braek Time</th>
                <th>Shfit Days</th>
                <th>Shift Reoccuring</th>
                <th>Open Time</th>
                <th>Close Time</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($shifts as $shift)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $shift->shift_name }}</td>
                  <td>{{ $shift->break_time }}</td>
                  <td>{{ $shift->shift_days }}</td>
                  <td>{{ $shift->shift_reoccuring }}</td>
                  <td>{{ $shift->open_time }}</td>
                  <td>{{ $shift->close_time }}</td>
                  <td>
                    <a href="{{ route('shift.edit',$shift->company_shift_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> |
                    <a href="javascript:;" onclick="confirmDelete('{{$shift->company_shift_id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <form id="delete-shift-{{$shift->company_shift_id}}" action="{{ route('shift.destroy',$shift->company_shift_id) }}" method="POST" style="display: none;">
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
          document.getElementById('delete-shift-'+id).submit();
      }
  }
</script>
@stop