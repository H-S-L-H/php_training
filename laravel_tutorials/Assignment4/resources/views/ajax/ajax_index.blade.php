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
    
      <div class="form">
            <div class="form-group">
              @csrf
                <label for="roll">Roll Number</label>
                <input type="text" class="form-control" name="roll" id="roll"/>
            </div>
          <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" name="name" id="name"/>
          </div>
          <div class="form-group">
              <label for="major_id">Choose your major</label>
              <select class="form-control" name="major_id" id="major_id">
                <option value="">Choose...</option>
                @foreach ($majors as $major)
                  <option value="{{$major->id}}">{{ $major->major_name }}</option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
              <label for="phone">Phone</label>
              <input type="tel" class="form-control" name="phone" id="phone"/>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" name="email" id="email"/>
          </div>
          <div class="form-group">
              <label for="address">Address</label>
              <textarea class="form-control" name="address" rows="3" id="address"></textarea>
          </div>
          <button type="submit" class="btn btn-block btn-danger" id="create-btn">Create Student</button>
</div>
  </div>

  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Roll Number</td>
          <td>Name</td>
          <td>Major</td>
          <td>Phone</td>
          <td>Email</td>
          <td>Address</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody class="students-table-body">
        
    </tbody>
  </table>
<div>
  <script src="/js//library/jquery-3.6.0.min.js"></script>
  <script src="/js/students.js"></script>
@endsection