@extends('students.layout')
@section('content')
<div class="card">
  <div class="card-header">Edit Student</div>
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
      
      <form action="{{ route('students.update',$student->id)}}" method="post">
       @csrf
       @method("PUT")
        <label>Name</label></br>
        <input type="text" name="studname" value="{{$student->studname}}" class="form-control"></br>
        <label>Course</label></br>
        <input type="text" name="course" value="{{$student->course}}"  class="form-control"></br>
        <label>Fee</label></br>
        <input type="number" name="fee" value="{{$student->fee}}" class="form-control"></br>
        <label>Profile Picture</label></br>
        <input type="file" name="profile_picture" class="form-control"></br>
        <img src="{{ asset('uploads/students/'.$student->profile_picture) }}" alt="" width="70px" height="70px">
        <input type="submit" value="Save" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@endsection