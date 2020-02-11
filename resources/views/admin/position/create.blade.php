@extends('adminlte::page')
@section('title', 'Users | Lara Admin')
@section('content_header')
<div class="clearfix">
  <h1 class="pull-left">Add Position</h1>
  <h1 class="pull-right"><a href="{{route('location.index')}}" class="btn btn-primary">All Positions</a></h1>
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
            <form action="{{route('position.store')}}" method="post">
                @csrf
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                          Poition Title
                          @if($errors->has('location_name'))
                              <span class="text-danger">
                                  {{ $errors->first('position_title')}}*
                              </span>
                          @endif
                      </label>
                      <input type="text" class="form-control" name="position_title" value="{{old('position_title')}}">
                      
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                          Department
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
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                          Reported To
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
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>
                          Cost Center
                      </label>                    
                      <select class="form-control" name="cost_id">
                        <option value="0">Select Cost Center</option>
                        @foreach($costs as $cost)
                          <option value="{{$cost->id}}">{{$cost->center_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>
                        Salary Min
                          @if($errors->has('salary_min'))
                              <span class="text-danger">
                                  {{ $errors->first('salary_min')}}*
                              </span>
                          @endif
                      </label>
                      <input type="text" class="form-control" name="salary_min" value="{{old('salary_min')}}">
                      
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>
                          Salary Mid
                          @if($errors->has('salary_mid'))
                              <span class="text-danger">
                                  {{ $errors->first('salary_mid')}}*
                              </span>
                          @endif
                      </label>
                      <input type="text" class="form-control" name="salary_mid" value="{{old('salary_mid')}}">
                      
                    </div>
                  </div>

                  <div class="col-md-4">
                    <div class="form-group">
                      <label>
                          Salary Max
                          @if($errors->has('salary_max'))
                              <span class="text-danger">
                                  {{ $errors->first('salary_max')}}*
                              </span>
                          @endif
                      </label>
                      <input type="text" class="form-control" name="salary_max" value="{{old('salary_max')}}">
                      
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>
                          Position Description
                          @if($errors->has('description'))
                              <span class="text-danger">
                                  {{ $errors->first('description')}}*
                              </span>
                          @endif
                      </label>
                      <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                      <label>
                          Position File
                          @if($errors->has('description'))
                              <span class="text-danger">
                                  {{ $errors->first('description')}}*
                              </span>
                          @endif
                      </label>
                      <input type="file" class="form-control" name="position_file">
                    </div>
                  </div>

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
