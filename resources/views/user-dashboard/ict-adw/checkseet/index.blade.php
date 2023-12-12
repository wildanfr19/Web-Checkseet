@extends('layouts.app_custom')
@section('title-head','Checkseet')
@section('title','Checkseet')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="section">
	<div class="section-header">
		@permission('create-checkseet')
		<a href="{{ route('checkseet.create') }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-check"></i> Add</a>
		@endpermission
		<div class="section-header-breadcrumb">
			<div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
			<div class="breadcrumb-item"><a href="#">Checkseet Manage</a></div>
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
							<table class="table table-bordered dataTable no-footer" id="table-check-manage" width="100%" role="grid" aria-describedby="table-1_info">
								<thead>                                 
									<tr>
										<th width="7%">No.</th>
										<th class="text-center">Status Approve</th>
										<th class="text-center">Semester</th>
										<th class="text-center">Jenis</th>
										<th class="text-center">Tahun</th>
										<th class="text-center">Kode Asset</th>
										<th width="20%" class="text-center">Action</th>
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
@include('user-dashboard.ict-adw.checkseet.modal.modal-view')
@include('user-dashboard.ict-adw.checkseet.modal.modal-edit')
@include('user-dashboard.ict-adw.checkseet.modal.modal-edit-detail')
<script src="{{ asset('assets/Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>

	var checkSeetTbl = $('#table-checkseetIn').DataTable({
        paging: false,
        responsive: true,
        processing: true,
        serverSide: false,
        "bFilter": false,
        scrollY: '300px',
        scrollCollapse: true,
    });
		var table = $('#table-check-manage').DataTable({
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
				url: "{{ route('checkseet.index') }}",
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
			{ data: 'status', name: 'status', orderable: false, searchable: false, className: 'text-center' },
			{ data: 'semester', name: 'semester', className: 'text-right' },
			{ data: 'jenis', name: 'jenis', className: 'center' },
			{ data: 'tahun', name: 'tahun', className: 'text-center' },
			{ data: 'kode_asset', name: 'kode_asset', className: 'text-center' },
			{ data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-center' }
			]
	// 
});
$(document).on('click','#view-items', function(e){
    let id = $(this).data('id');
	let route = "{{ route('checkseet.viewHeader', ':id') }}";
        route = route.replace(':id', id);
        $.ajax({
            url: route,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
				$('#modal-view').modal('show')
				$('#nama-pemakai-view').val(data['header'].nama_pemakai);
				$('#tahun-view').val(data['header'].tahun);
				$('#kode-asset-view').val(data['header'].kode_asset);
				$('#lama-pemeriksaan-view').val(data['header'].lama_pemeriksaan);
                $('#jenis-view').val(data['header'].jenis);
                $('#jenis-view').val(data['header'].jenis).change();
                $('#semester-view').val(data['header'].semester);
                $('#semester-view').val(data['header'].semester).change();
               
                let route = "{{ route('checkseet.viewDetail', [':param1',':param2']) }}";
                let kode_asset = data['header'].kode_asset;
				let semester = data['header'].semester;
                route = route.replace(':param1', kode_asset);
				route = route.replace(':param2', semester);
                $('#table-checkseet-view').DataTable().clear().destroy();
                let table_view = $('#table-checkseet-view').DataTable({
					"columnDefs": [{
                        "searchable": false,
                        "orderable": false,
                        "targets": 0,
                        render: function(data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        },
                    }],
                    paging: false,
                    scrollY: '500px',
                    scrollCollapse: true,
                    serverSide: true,
                    processing: true,
                    ajax: route,
					searching: false,
					order: [[1, 'asc']],
                    columns: [
						{
                            data: null,
                            name: null,
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: 'items',
                            name: 'items'
                        },
                        {
                            data: 'standard',
                            name: 'standard'
                        },
                        {
                            data: 'mark',
                            name: 'mark'
                        },
                        {
                            data: 'catatan',
                            name: 'catatan',
							class: 'text-center'
                        },

                    ]
                });
            }
        });
  });
  $(document).on('click','#edit-items', function(e){
	e.preventDefault();
	let id = $(this).data('id');
	let get_approve_users = $(this).attr('row-approve-users');
	let get_approve_head = $(this).attr('row-approve-head');
	let get_approve_ict = $(this).attr('row-id');
	if (get_approve_users !== "" && get_approve_head !== "") {
		Swal.fire({
			icon: 'warning',
			title: 'Perhatian',
			text: 'Data ini sudah diapprove oleh users dan pimpinan dept head, data ini tidak bisa di un-approve',
			showConfirmButton: true
		});
		$('#modal-edit').modal('hide');
	} else {
		if (get_approve_ict !== "") {
			Swal.fire({
				icon: 'warning',
				title: 'Perhatian',
				text: 'Data ini sudah ter approve oleh Anda, jika ingin di edit un-approve terlebih dahulu',
				showConfirmButton: true
			});
		} else {
			let route = "{{ route('checkseet.editHeader', ':id') }}";
			route = route.replace(':id', id);
			$.ajax({
				url: route,
				method: 'GET',
				dataType: 'json',
				success: function(data) {
					$('#modal-edit').modal('show')
					$('#id-items-edit-header').val(data['header'].id)
					$('#nama-pemakai-edit').val(data['header'].nama_pemakai);
					$('#tahun-edit').val(data['header'].tahun);
					$('#kode-asset-edit').val(data['header'].kode_asset);
					$('#lama-pemeriksaan-edit').val(data['header'].lama_pemeriksaan);
					$('#jenis-edit').val(data['header'].jenis);
					$('#jenis-edit').val(data['header'].jenis).change();
					$('#semester-edit').val(data['header'].semester);
					$('#semester-edit').val(data['header'].semester).change();
				
					let route = "{{ route('checkseet.editDetail', [':param1',':param2']) }}";
					let kode_asset = data['header'].kode_asset;
					let semester = data['header'].semester;
					route = route.replace(':param1', kode_asset);
					route = route.replace(':param2', semester);
					$('#table-checkseet-edit').DataTable().clear().destroy();
					let table_edit = $('#table-checkseet-edit').DataTable({
						"columnDefs": [{
							"searchable": false,
							"orderable": false,
							"targets": 0,
							render: function(data, type, row, meta) {
								return meta.row + meta.settings._iDisplayStart + 1;
							}
						}],
						paging: false,
						scrollY: '300px',
						scrollCollapse: true,
						serverSide: true,
						processing: true,
						ajax: route,
						searching: false,
						order: [[1, 'asc']],
						columns: [
							{
								data: null,
								name: null,
								orderable: false,
								searchable: false
							},
							{
								data: 'items',
								name: 'items'
							},
							{
								data: 'standard',
								name: 'standard'
							},
							{
								data: 'mark',
								name: 'mark'
							},
							{
								data: 'catatan',
								name: 'catatan',
								class: 'text-center'
							},
							{ 
								data: 'action', 
								name: 'action', 
								orderable: false, searchable: false 
							}

						]
					});
				}
			});
		}
	}
	
  });
  $(document).on('click','#edit-items-detail', function(e){
	e.preventDefault();
	let id = $(this).data('id');
	let route = "{{ route('checkseet.editDetailItems',':param') }}";
	let replace_route = route.replace(':param', id);
	$.get(replace_route, function(data){
		console.log(data)
		$('#modal-edit-detail').modal('show')
		$('#id-items-edit-detail').val(data.id);
		$('#items-edit-detail').val(data.items);
		$('#standard-edit-detail').val(data.standard);
		$('#catatan-edit-detail').val(data.catatan);
		$('#mark-edit-detail').val(data.mark);
        // Menangani checkbox 'mark' sesuai dengan nilai yang diterima dari server
        if (data.mark) {
            $('#check-mark-edit-detail').prop('checked', true);
            // Jika dicentang, set nilai input "baik"
            $('#mark-edit-detail').val(data.mark);
        } else {
            $('#check-mark-edit-detail').prop('checked', false);
            // Jika tidak dicentang, kosongkan nilai input
            $('#mark-edit-detail').val('-');
        }
		$('#check-mark-edit-detail').on('change', function(){
			if ($(this).is(':checked')) {
                    // Ketika checkbox dicentang, set nilai input "baik"
                $('#mark-edit-detail').val('baik');
			} else {
				// Ketika checkbox tidak dicentang, kosongkan nilai input
				$('#mark-edit-detail').val("");
			}
		})
	})
  });
  $(document).on('click','#update-header', function(){
	let id = $('#id-items-edit-header').val();
	var route = "{{ route('checkseet.update', ':param') }}";
    route_replace = route.replace(':param', id);
	$.ajax({
        url: route_replace,
        type: "POST",
        data: $('#form-items-edit-header').serialize(),
        success: function(response) {
		   if (response.status == true) {
			   $('#modal-edit').modal('hide')
			   Swal.fire({
					icon: 'success',
					title: 'Success!',
					text: 'Berhasil Mengubah data',
					showConfirmButton: true,
				}).then(function(){
					$('#table-check-manage').DataTable().ajax.reload();
				});
		   } else {
			   alert('error')
		   } 
        }
    });
  })
  $(document).on('click','#submit-edit-detail', function(){
	let id =  $('#id-items-edit-detail').val();
	var route = "{{ route('checkseet.updateDetail', ':param') }}";
    route_replace = route.replace(':param', id);
	$.ajax({
        url: route_replace,
        type: "POST",
        data: $('#form-items-edit-detail').serialize(),
        success: function(response) {
        //    console.log(data);
		   if (response.status == true) {
			   $('#modal-edit-detail').modal('hide')
			//    $('#table-checkseet-edit').DataTable().clear().destroy();
               $('#table-checkseet-edit').DataTable().ajax.reload();
		   } else {
			   alert('error')
		   } 
        }
    });
  })
$(document).on('click','#approve-ict', function(e){
	e.preventDefault();
    let id = $(this).data('id');
	let get_approve_ict = $(this).attr('row-id');
	let get_approve_users = $(this).attr('row-approve-users');
	let get_approve_head = $(this).attr('row-approve-head');

	let route = "{{ route('checkseet.approve-ict',':param') }}";
	let route_replace = route.replace(':param', id);
	if(get_approve_ict !== "")
	 {
			if (get_approve_users !== "") {
				Swal.fire({
					icon: 'warning',
					title: 'Perhatian',
					text: 'Data ini sudah diapprove oleh users atau pimpinan dept head, data ini tidak bisa di un-approve',
				})
			} else {
				Swal.fire({
						title: 'Are you sure?',
						text: 'Un-Approve this data',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes!'
				}).then((willUn_Approve) => {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					if (willUn_Approve.value) {
						$.ajax({
							url: route_replace,
							type: "POST",
							data: {
								'_method': 'POST'
							},

							success: function(data) {
								if (data.status == true) {
									Swal.fire({
										position: 'top',
										icon: 'success',
										title: 'Success Un-Approve Data',
										showConfirmButton: false,
										timer: 3000
									})
									$('#table-check-manage').DataTable().ajax.reload();
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
						console.log(`data was dismissed by ${willUn_Approve.dismiss}`);
					}

				})
			}
	} else {
		Swal.fire({
			title: 'Are you sure?',
			text: 'Approve this data',
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((willApprove) => {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			if (willApprove.value) {
				$.ajax({
					url: route_replace,
					type: "POST",
					data: {
						'_method': 'POST'
					},

					success: function(data) {
						if (data.status == true) {
							Swal.fire({
								position: 'top',
								icon: 'success',
								title: 'Success Approve Data',
								showConfirmButton: false,
								timer: 3000
							})
							$('#table-check-manage').DataTable().ajax.reload();
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
				console.log(`data was dismissed by ${willApprove.dismiss}`);
			}

		})
	}
});
$(document).on('click','#deleted-items-data', function(e){
	let id = $(this).data('id');
	let approve_users = $(this).attr('row-approve-users');
	let approve_head = $(this).attr('row-approve-head');
    let approve_ict = $(this).attr('row-id');
	let route = $(this).attr('data-href');
	if (approve_ict == "" && approve_ict !== "") {
		Swal.fire({
			title: 'Are you sure?',
			text: 'Delete this data',
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
					url: route,
					type: "POST",
					data: {
						'_method': 'DELETE'
					},

					success: function(data) {
						if (data.status == true) {
							Swal.fire({
								position: 'top',
								icon: 'success',
								title: 'Success Deleted Data',
								showConfirmButton: false,
								timer: 3000
							})
							$('#table-check-manage').DataTable().ajax.reload();
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
	} else if(approve_ict !== "" && approve_users !== "") {
		Swal.fire({
			position: 'top',
			icon: 'warning',
			title: 'Warning',
			text: 'Data Checkseet ini tidak bisa dihapus dikarenakan sudah approve oleh users/dept head',
			showConfirmButton: true,
			timer: 3000
		})
	} else if(approve_users !== "" && approve_head !== ""){
		Swal.fire({
			position: 'top',
			icon: 'warning',
			title: 'Warning',
			text: 'Data Checkseet ini tidak bisa dihapus dikarenakan sudah approve oleh users/dept head',
			showConfirmButton: true,
			timer: 3000
		})
	}
	
	
	
});
$(document).on('click','#approve-users', function(e){
	e.preventDefault()
	let id = $(this).data('id');
	let approve_users = $(this).attr('row-approve-users');
	let approve_head = $(this).attr('row-approve-head');
    let route = "{{ route('checkseet.approve_users',':param') }}";
	let route_replace = route.replace(':param', id);
	let approve_ict = $(this).attr('row-id');
	if (approve_ict == "") {
		Swal.fire({
			position: 'top',
			icon: 'warning',
			title: 'Data Checkseet ini belum di approve ICT Staff mohon tunggu',
			showConfirmButton: true,
			timer: 3000
		})
	} else {
		if (approve_users == "") {
			    Swal.fire({
						title: 'Are you sure?',
						text: 'Approve this data',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes!'
				}).then((willApprove) => {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					if (willApprove.value) {
						$.ajax({
							url: route_replace,
							type: "POST",
							data: {
								'_method': 'POST'
							},

							success: function(data) {
								if (data.status == true) {
									Swal.fire({
										position: 'top',
										icon: 'success',
										title: 'Success Approve Data',
										showConfirmButton: true,
										timer: 3000
									})
									$('#table-check-manage').DataTable().ajax.reload();
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
						console.log(`data was dismissed by ${willApprove.dismiss}`);
					}

				})
		} else {
			if (approve_head !== "") {
				Swal.fire({
					position: 'top',
					icon: 'warning',
					title: 'Warning',
					text: 'Data Checkseet ini sudah di approve oleh pimpinan dept head tidak bisa di Un-Approve',
					showConfirmButton: true,
					timer: 3000
				})
			} else {
				Swal.fire({
						title: 'Are you sure?',
						text: 'Un Approve this data',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes!'
				}).then((willUnApprove) => {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					if (willUnApprove.value) {
						$.ajax({
							url: route_replace,
							type: "POST",
							data: {
								'_method': 'POST'
							},

							success: function(data) {
								if (data.status == true) {
									Swal.fire({
										position: 'top',
										icon: 'success',
										title: 'Success Un Approve Data',
										showConfirmButton: true,
										timer: 3000
									})
									$('#table-check-manage').DataTable().ajax.reload();
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
						console.log(`data was dismissed by ${willUnApprove.dismiss}`);
					}
				})
			}
		}
	}
});
$(document).on('click','#approve-head', function(e){
	e.preventDefault()
	let id = $(this).data('id');
	let approve_users = $(this).attr('row-approve-users');
	let approve_head = $(this).attr('row-approve-head');
    let route = "{{ route('checkseet.approve-head',':param') }}";
	let route_replace = route.replace(':param', id);
	let approve_ict = $(this).attr('row-id');
	if (approve_ict == "") {
		Swal.fire({
			position: 'top',
			icon: 'warning',
			title: 'Warning',
			text: 'Data Checkseet ini belum di approve oleh ICT Staff / Users',
			showConfirmButton: true,
			timer: 3000
		})
	} else if(approve_users == "") {
		Swal.fire({
			position: 'top',
			icon: 'warning',
			title: 'Warning',
			text: 'Data Checkseet ini belum di approve oleh  ICT Staff / Users',
			showConfirmButton: true,
			timer: 3000
		})
	} else {
		if (approve_head !== "") {
			Swal.fire({
				title: 'Are you sure?',
				text: 'Un Approve this data',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
		}).then((willUnApprove) => {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			if (willUnApprove.value) {
				$.ajax({
					url: route_replace,
					type: "POST",
					data: {
						'_method': 'POST'
					},

					success: function(data) {
						if (data.status == true) {
							Swal.fire({
								position: 'top',
								icon: 'success',
								title: 'Success Un Approve Data',
								showConfirmButton: true,
								timer: 3000
							})
							$('#table-check-manage').DataTable().ajax.reload();
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
					console.log(`data was dismissed by ${willUnApprove.dismiss}`);
				}
			})
		} else {
			Swal.fire({
				title: 'Are you sure?',
				text: 'Approve this data',
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes!'
				}).then((willApprove) => {
					$.ajaxSetup({
						headers: {
							'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						}
					});
					if (willApprove.value) {
						$.ajax({
							url: route_replace,
							type: "POST",
							data: {
								'_method': 'POST'
							},

							success: function(data) {
								if (data.status == true) {
									Swal.fire({
										position: 'top',
										icon: 'success',
										title: 'Success Approve Data',
										showConfirmButton: true,
										timer: 3000
									})
									$('#table-check-manage').DataTable().ajax.reload();
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
						console.log(`data was dismissed by ${willApprove.dismiss}`);
					}

				})
		}
	}

})
</script>

@endpush