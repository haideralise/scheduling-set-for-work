@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
<div class="clearfix">
  <h1 class="pull-left">Update Department</h1>
  <h1 class="pull-right"><a href="{{route('department.index')}}" class="btn btn-primary">All Departments</a></h1>
</div>
    
@stop
@section('content')
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
          @endif     
        </div>
        <div class="box-body">
            <form action="{{route('department.update',$department->company_department_id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>
                        Department Title
                        @if($errors->has('department_title'))
                            <span class="text-danger">
                                {{ $errors->first('department_title')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="department_title" value="{{$department->department_title}}">
                    
                </div>
                <div class="form-group">
                    <label>
                        Department Description
                        @if($errors->has('department_description'))
                            <span class="text-danger">
                                {{ $errors->first('department_description')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="department_description" value="{{$department->department_description}}">
                </div>
                <input type="submit" class="btn btn-success">
            </form>
        </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
@stop
