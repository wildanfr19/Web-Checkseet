@extends('layouts.app_custom')
@section('title-head','Edit Module ')
@section('title','Edit Module')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="section-body">
  <form action="{{ route('module.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body">
             <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" value="{{ $data->name }}" class="form-control @error('name') is-invalid @enderror" required autocomplete="off">
              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <button type="submit" id="save" class="btn btn-primary">Save</button>
              <a href="{{ route('role.index') }}" class="btn btn-secondary">Back</a>
            </div>

          </div>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection