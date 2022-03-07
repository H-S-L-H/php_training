@extends('layout')

@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }

  .edit-delete-btn {
    width: 70px;
  }
</style>


  <div class="card-header">
    Add User
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="mb-3 ms-3 me-5 mt-0 float-start">
        <a href="{{ url('/export-csv') }}" class="btn btn-success"></i>Export CSV</a>
    </div>
    <div class="mb-3 me-5 mt-0">
        <a href="{{ url('/import-export-csv') }}" class="btn btn-success"></i>Import CSV</a>
    </div>
      <form method="post" action="/create">
            <div class="form-group">
              @csrf
                <label for="roll">Roll Number</label>
                <input type="text" class="form-control" name="roll"/>
            </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="major_id">Choose your major</label>
              <select class="form-control" name="major_id">
                <option value="">Choose...</option>
                @foreach ($majors as $major)
                  <option value="{{$major->id}}">{{ $major->major_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" name="address" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Create Student</button>
      </form>
  </div>

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
<div>
@endsection