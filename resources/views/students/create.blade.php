@extends('students.layout')
@section('content')
<div class="card">
  <div class="card-header">Add New Student</div>
  <div class="pull-right">
    <a class="btn btn-primary" href="{{route('students.index')}}">Back</a>
  </div>

  @if($errors->any())
  <div class="alert alert-danger">
    <strong>Oops!</strong>There were some problems!<br>
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul> 
  </div> 
  @endif
  <div class="card-body">
      
      <form action="{{ route('students.store')}}" method="post" enctype="multipart/form-data">
       @csrf
        <label>Name</label></br>
        <input type="text" name="studname"  class="form-control"></br>
        <label>Course</label></br>
        <input type="text" name="course"  class="form-control"></br>
        <label>Fee</label></br>
        <input type="number" name="fee" class="form-control"></br>
        <label>Profile Picture</label></br>
        <input type="file" name="profile_picture" class="form-control"></br>
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection