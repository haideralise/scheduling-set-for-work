@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
<div class="clearfix">
  <h1 class="pull-left">Add Location</h1>
  <h1 class="pull-right"><a href="{{route('location.index')}}" class="btn btn-primary">All Locations</a></h1>
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
            <form action="{{route('location.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label>
                        Location Name
                        @if($errors->has('location_name'))
                            <span class="text-danger">
                                {{ $errors->first('location_name')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="location_name" value="{{old('location_name')}}">
                    
                </div>
                <div class="form-group">
                    <label>
                        Location Description
                        @if($errors->has('location_description'))
                            <span class="text-danger">
                                {{ $errors->first('location_description')}}*
                            </span>
                        @endif
                    </label>
                    <input type="text" class="form-control" name="location_description" value="{{old('location_description')}}">
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
