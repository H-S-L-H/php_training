@extends('layout')

@section('content')

<style>
    .push-top {
    margin-top: 50px;
  }
</style>
<div class="card push-top">
  <div class="card-header">
    Update Student Information
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
      <div class="form">
        <input type="hidden" class="id" value="{{$students->id}}" name="id"  id="id">
          <div class="form-group">
              @csrf
              <label for="roll">Roll Number</label>
                <input type="text" class="form-control" name="roll" id="roll" value="{{ $students->roll }}"/>
            </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name" value="{{ $students->name }}"/>
          </div>
          <div class="form-group">
              <label for="major_id">Choose your major</label>
              <select class="form-control" name="major_id" id="major_id">
              @foreach ($majors as $major)
                @if($students->major_id == $major->id) {
                    <option value="{{ $major->id }}" selected>{{ $major->major_name }}</option>
                }
                @else
                    <option value="{{ $major->id }}">{{ $major->major_name }}</option>
                @endif
              @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone" value="{{ $students->phone }}"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{ $students->email }}"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" name="address" id="address" rows="3">{{ $students->address }}</textarea>
          </div>
          <button type="submit" class="btn btn-block btn-danger" id="update-btn">Update Student</button>
    </div>
  </div>
</div>
<script src="/js/library/jquery-3.6.0.min.js"></script>
<script src="/js/students.js"></script>
@endsection