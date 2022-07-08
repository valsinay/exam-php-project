@include('inc.navbar')
@extends('students.layout')
@section('content')
<style>
    .flexClass{
      display:flex;
    }
  </style>
<div class="container">
    <div class="card">
        <div class="card-header">View Student</div>
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
        <div class="flexClass">

            <form action="{{ route('students.update',$student->id)}}" method="post" style="display:flex">
                @csrf
                <section>
                    <img src="{{ asset('uploads/students/'.$student->profile_picture) }}" alt="" width="270px"
                        height="270px"></br>
                </section>
                <section style="margin-left:10px"> 
                  <label>Name</label></br>
                    <input type="text" name="studname" readonly value="{{$student->studname}}"
                        class="form-control"></br>
                    <label>Course</label></br>
                    <input type="text" name="course" readonly value="{{$student->course}}" class="form-control"></br>
                    <label>Fee</label></br>
                    <input type="number" name="fee" readonly value="{{$student->fee}}" class="form-control"></br>
                </section>

            </form>

        </div>
    </div>
</div>
@endsection