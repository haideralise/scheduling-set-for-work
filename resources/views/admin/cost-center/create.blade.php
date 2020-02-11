@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
<div class="clearfix">
  <h1 class="pull-left">Add Cost Center</h1>
  <h1 class="pull-right"><a href="{{route('cost-center.index')}}" class="btn btn-primary">All Cost Centers</a></h1>
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
            <form action="{{route('cost-center.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>
                        Center Name
                        @if($errors->has('center_name'))
                            <span class="text-danger">
                                {{ $errors->first('center_name')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="center_name" value="{{old('center_name')}}">
                    
                </div>
                <div class="form-group">
                    <label>
                        Center Code
                        @if($errors->has('center_code'))
                            <span class="text-danger">
                                {{ $errors->first('center_code')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="center_code" value="{{old('center_code')}}">
                </div>
                <div class="form-group">
                    <label>
                        Department Name
                        @if($errors->has('department_id'))
                            <span class="text-danger">
                                {{ $errors->first('department_id')}}*
                            </span>
                        @endif
                    </label>                    
                    <select class="form-control" name="department_id">
                      <option value="0">Select Department</option>
                      @foreach($departments as $department)
                        <option value="{{$department->company_department_id}}">{{$department->department_title}}</option>
                      @endforeach
                    </select>
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
