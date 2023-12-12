@extends('layouts.app_custom')
@section('title-head','Edit User ')
@section('title','Edit User')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="section-body">
  <form action="{{ route('user.update', $user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body">
             <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required autocomplete>

              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" value="{{ $user->username }}" id="username" class="form-control @error('username') is-invalid @enderror" required autocomplete>

              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control  @error('email') is-invalid @enderror" required autocomplete="off">
              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Hak Akses</label>
              <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id">
                @php 
                $db = new \App\Role(); 
                @endphp
                @foreach($db->getRoles() as $val)
                <option value="{{ $val->id }}  " @if($val->id == $user->role_id) selected  @endif>{{ $val->name }}</option>
                @endforeach

               {{--  <p>{{ $user->role_id }}</p> --}}
              </select>
              @error('role_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          

            <div class="form-group">
              <button type="submit" id="save" class="btn btn-primary">Save</button>
              <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
            </div>

          </div>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection