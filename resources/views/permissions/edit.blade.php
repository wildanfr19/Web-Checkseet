@extends('layouts.app_custom')
@section('title-head','Edit Permission ')
@section('title','Edit Permission')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="section-body">
  <form action="{{ route('permission.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body">
             <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $data->name }}"  required autocomplete="off">

              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Display Name</label>
              <input type="text" name="display_name" value="{{ $data->display_name }}" id="display_name" class="form-control @error('display_name') is-invalid @enderror" required autocomplete="off">

              @error('display_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <label>Description</label>
              <input type="text" name="description" id="description" value="{{ $data->description }}"  class="form-control  @error('description') is-invalid @enderror" required autocomplete="off">
              @error('description')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="form-group">
              <label>Module</label>
              <select class="form-control @error('module_id') is-invalid @enderror" id="module_id" name="module_id">
                @php 
                $db = new \App\Permission(); 
                @endphp
                @foreach($db->getModuleAttribute() as $val)
                <option value="{{ $val->id }}" @if($val->id === $data_2->module_id) selected @endif>{{ $val->name }}</option>
                @endforeach
              </select>
              @error('module_id')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="form-group">
              <button type="submit" id="save" class="btn btn-primary">Save</button>
              <a href="{{ route('permission.index') }}" class="btn btn-secondary">Back</a>
            </div>

          </div>
        </div>

      </div>
    </form>
  </div>
</div>

@endsection