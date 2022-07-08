@include('inc.navbar')
@extends('students.layout')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">Dashboard</div>
        <div class="card-body">
            <a href="{{ route('students.create') }}" class="btn btn-success btn-sm" title="Add New Student">
                <i class="fa fa-plus" aria-hidden="true"></i> Add New Student
            </a>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <br />
            <br />
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Fee</th>
                            <th>Profile Picture</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $student->studname }}</td>
                            <td>{{ $student->course }}</td>
                            <td>{{ $student->fee }}</td>
                            <td>
                                <img src="{{ asset('uploads/students/'.$student->profile_picture) }}" alt=""
                                    width="70px" height="70px">
                            </td>
                            <td>
                                <a href="{{ route('students.show',$student->id)}}" title="View Student"><button
                                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i>
                                        View</button></a>
                            @auth
                                <a href="{{ route('students.edit',$student->id)}}" title="Edit Student"><button
                                        class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"
                                            aria-hidden="true"></i> Edit</button></a>
                            @endauth
                                
                                <form method="POST" action="{{route('students.destroy',$student->id)}}"
                                    accept-charset="UTF-8" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Delete Student"
                                        onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o"
                                            aria-hidden="true"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection