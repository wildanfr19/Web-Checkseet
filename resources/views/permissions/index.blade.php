@extends('layouts.app_custom')
@section('title-head','Permission Management')
@section('title','Permission Management')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="section">
	<div class="section-header">
		<a href="{{ route('permission.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-check"></i> Add</a>
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Permission Management</a></div>
			{{-- <div class="breadcrumb-item">DataTables</div> --}}
		</div>
	</div>
	<div class="section-body">
		<div class="row">
			<div class="col-12">
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
						<div class="table-responsive">
							<table class="table table-striped dataTable no-footer" id="table-permission-manage" width="100%" role="grid" aria-describedby="table-1_info">
								<thead>
									<tr>
										<th width="7%">No.</th>
										<th>Name Module</th>
										<th>Name Permissions</th>
										<th>Display Name</th>
										<th>Description</th>
										{{-- <th>Created At</th> --}}
										<th width="20%">Action</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
@push('js')
<script src="{{ asset('assets/Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/Datatables/dataTables.rowGroup.js') }}"></script>
<script>
	var table = $('#table-permission-manage').DataTable({
		"columnDefs": [{
			"searchable": false,
			"orderable": false,
			"targets": 0,
			render: function(data, type, row, meta) {
				return meta.row + meta.settings._iDisplayStart + 1;
			},
		}],
		processing: true,
		serverSide: true,
		deferRender:true,
		ajax: {
			url: "{{ route('permission.index') }}",
		},
		order: [[ 0, 'desc']],
		responsive: true,
		columns: [
		{
			data: null,
			name: null,
			orderable: false,
			searchable: false,
			className: 'text-center'
		},
		{ data: 'name_module', name: 'name_module' },
		{ data: 'name', name: 'name' },
		{ data: 'display_name', name: 'display_name' },
		{ data: 'description', name: 'description' },
		{ data: 'action', name: 'action', orderable: false, searchable: false },

		],
		rowGroup: {
           dataSrc: 'name_module',
        }
//


  
});

$(document).on('click','#deleted-data-permission', function(e){
	e.preventDefault();
    var href = $(this).attr('data-href');
    Swal.fire({
        title: 'Are you sure?',
        text: 'Deleted this data',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
    }).then((willDeleted) => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        if (willDeleted.value) {
            $.ajax({
                url: href,
                type: "POST",
                data: {
                    '_method': 'DELETE'
                },

                success: function(data) {
                    if (data.msg == true) {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Success Deleted Data',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('#table-permission-manage').DataTable().ajax.reload();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                }
            })
        } else {
            console.log(`data was dismissed by ${willDeleted.dismiss}`);
        }

    })
})

</script>
@endpush