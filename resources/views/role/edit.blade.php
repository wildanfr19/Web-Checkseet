@extends('layouts.app_custom')
@section('title-head','Edit Role & Set Permission ')
@section('title','Edit Role & Set Permission')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="section-body">
  <form action="{{ route('role.update', $role->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
      <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
          <div class="card-body">

            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible show fade">
              <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
              <div class="alert-body">
                <div class="alert-title">Success</div>
                {{ session()->get('success') }}
              </div>
              <button class="close" data-dismiss="alert">
                <span>×</span>
              </button>
            </div>
            @endif
           <div class="form-group">
            <label>Name</label>
            <input type="text" name="name" value="{{ $role->name }}" id="name" class="form-control @error('name') is-invalid @enderror" required autocomplete="off">

            @error('username')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>
          <div class="form-group">
            <label>Display Name</label>
            <input type="text" name="display_name" value="{{ $role->display_name }}" id="display_name" class="form-control @error('display_name') is-invalid @enderror" required autocomplete="off">

            @error('display_name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
          </div>

          <div class="form-group">
            <label>Description</label>
            <input type="text" name="description" id="text"  value="{{ $role->description }}" class="form-control  @error('description') is-invalid @enderror" required autocomplete="off">
            @error('description')
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


<div class="col-sm-12">
  <div class="card card-warning">
    <div class="card-body">
      <h4 class="mt-0 header-title">Role Management</h4>
      <p class="sub-title">Silahkan Pilih Module-module Role Untuk Mengatur Permission</p>
      @php
      $accordion = 0;
      @endphp
      <div id="accordion">
        @foreach ($module as $item)
        <div class="card mb-2 border border-secondary">
          <div class="card-header" id="headingOne{{$item->id}}">
            <h5 class="mb-0 mt-0 font-14">
              <a data-toggle="collapse" data-parent="#accordion"
              href="#collapseOne{{$item->id}}" aria-expanded="{{ ($accordion == 0) ? 'true' : 'false'}}"
              aria-controls="collapseOne{{$item->id}}" class="text-dark">
              {{ $item->name }}
            </a>
          </h5>
        </div>

        <div id="collapseOne{{$item->id}}" class="collapse false{{ ($accordion == 0) ? 'show' : ''}}"
          aria-labelledby="headingOne{{$item->id}}" style="" data-parent="#accordion">
          <div class="card-body">
            @foreach ($item->permission as $row)
            <div class="icheck-material-secondary icheck-inline">
              @php
              $permission_with_role = $row->permission_with_role($row->id, $role->id);
              @endphp
            </div>
            <div class="icheck-material-secondary icheck-inline">
              @if (!empty($permission_with_role))
              @if ($row->id == $permission_with_role->permission_id)
              <input type="checkbox" id="inlineCheckbox{{$row->id}}" value="{{$row->id}}" checked="" data-permission="{{ $row->name }}">
              <label for="inlineCheckbox{{$row->id}}"> {{ $row->display_name }} </label>
              @endif
              @else
              <input type="checkbox" id="inlineCheckbox{{$row->id}}" value="option{{$row->id}}" data-permission="{{ $row->name }}">
              <label for="inlineCheckbox{{$row->id}}"> {{ $row->display_name }} </label>
              @endif
            </div>
            @endforeach
          </div>
        </div>
      </div>
      @php
      $accordion++;
      @endphp
      @endforeach
    </div>
  </div>
</div>
</div>



@endsection
@push('js')
<script type="text/javascript">
 $(function(){
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $(document).on('click', 'input[type=checkbox]', function(e){
    console.log($(this).data('permission'))
    if($(this).is(':checked')){
      console.log("Checked")
      $.ajax({
        type:'POST',
        url: '{{ route('permission.attach', $role->id) }}',
        data: {
          permission: $(this).data('permission')
        },
        success: function(data){
          Swal.fire(
            'Success!',
            'Give the Permission',
            'success'
            )
        }
      })
    } else {
      $.ajax({
        type:'POST',
        url: '{{ route('permission.detach', $role->id) }}',
        data: {
          permission: $(this).data('permission')
        },
        success: function(data){
          Swal.fire(
            'Success!',
            'Give Canceled Permission',
            'success'
            )
        }
      })
    }
  });
})
</script>

@endpush