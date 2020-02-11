@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
    <div class="clearfix">
    <h1 class="pull-left">Locations</h1>
    <h1 class="pull-right"><a href="{{route('location.create')}}" class="btn btn-primary">Add Location</a></h1>
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
                <th>Description</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($locations as $location)
                <tr>
                  <td>{{ $loop->index+1 }}</td>
                  <td>{{ $location->location_name }}</td>
                  <td>{{ $location->location_description }}</td>
                  <td>
                    <a href="{{ route('location.edit',$location->company_location_id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a> |
                    <a href="javascript:;" onclick="confirmDelete('{{$location->company_location_id}}')" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                    <form id="delete-location-{{$location->company_location_id}}" action="{{ route('location.destroy',$location->company_location_id) }}" method="POST" style="display: none;">
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
          document.getElementById('delete-location-'+id).submit();
      }
  }
</script>
@stop