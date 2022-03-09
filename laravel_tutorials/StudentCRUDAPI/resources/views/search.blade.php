@extends('layout')

@section('content')
<style>
  .edit-delete-btn {
    width: 70px;
  }
</style>

<table class="table">
    <thead>
        <tr class="table-warning">
          <td>No.</td>
          <td>Roll Number</td>
          <td>Name</td>
          <td>Major</td>
          <td>Phone</td>
          <td>Email</td>
          <td>Address</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($students as $student)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$student->roll}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->major->major_name}}</td>
            <td>{{$student->phone}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->address}}</td>
            <td>
              <a href="{{ url('studentEdit/' . $student->id . '') }}" class="btn btn-primary edit-delete-btn">Edit</a>
              <form action="/student/{{ $student->id }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                                    
                <br><button class="btn btn-primary edit-delete-btn">Delete</button>
              </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  @endsection