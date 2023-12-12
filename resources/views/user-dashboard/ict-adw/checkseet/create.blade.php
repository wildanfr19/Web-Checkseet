@extends('layouts.app_custom')
@section('title-head','Checkseet In ')
@section('title','Checkseet In')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/Datatables/dataTables.bootstrap4.min.css') }}">
@endsection
@section('content')
<div class="section-body">

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                  <div class="pull-right">
                    <button class="btn btn-sm btn-primary" id="add-items">Add Item</button>
                    <button class="btn btn-sm btn-primary submit-data" id="submit-data">Submit</button> 
                   <a href="{{ route('checkseet.index') }}" class="btn btn-sm  btn-primary" id="back">Back</a>
                   <button class="btn btn-sm btn-outline btn-warning" id="refresh-form"><i class="fa fa-refresh"> </i>Clear</button>
                  </div>
                  <br>
                    <form class="form-inline">
                        <div class="form-group mr-2">
                          <input type="text" class="form-control" id="nama-pemakai" placeholder="Nama Pemakai">
                        </div>
                        <div class="form-group mr-2">
                          <input type="date" class="form-control" id="tahun" placeholder="Tahun">
                        </div>
                        <div class="form-group mr-2">
                          <input type="text" class="form-control" id="kode-asset" placeholder="Kode Asset">
                        </div>
                        <div class="form-group mr-2">
                          <select name="jenis" id="jenis" class="form-control">
                            <option value="">- Pilih Jenis -</option>
                            <option value="pc">PC</option>
                            <option value="laptop">Laptop</option>
                          </select>
                        </div>
                        <div class="form-group mr-1">
                          <input type="number" class="form-control" id="lama-pemeriksaan" placeholder="Lama Pemeriksaan">
                        </div>
                        <div class="form-group mr-1" style="margin-top: 0.4%">
                            <select name="semester" id="semester" class="form-control">
                              <option value="">- Pilih Semester -</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                            </select>
                        </div>
                      </form>
                      <table class="table table-striped dataTable no-footer" id="table-checkseet-create">
                        <thead>
                          <tr>
                            <th scope="col">Items</th>
                            <th scope="col">Standard</th>
                            <th scope="col">Mark</th>
                            <th scope="col">Catatan</th>
                          </tr>
                        </thead>
                        <br>
                        <tbody>
                        </tbody>
                      </table>
                <br>
                <div class="float-right">
                 
                </div>    
                </div>
                
            </div>

        </div>

    </div>

</div>

@endsection
@push('js')
<script src="{{ asset('assets/Datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/Datatables/dataTables.bootstrap4.min.js') }}"></script>
<script>
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  let tb_create =  $('#table-checkseet-create').DataTable({
      responsive: true,
      processing: true,
      serverSide: false,
      paging:  false,
      scrollY: '500px',
      scrollCollapse: true,
      bFilter: false,
      "lengthChange": false
   });
  let count_click = 0;
  $(document).on('click','#add-items', function(e){
    count_click++;
    if (count_click > 1) {
           Swal.fire({
              position: 'top',
              icon: 'warning',
              title: 'Perhatian',
              text: 'Data Item Sudah ada!',
              showConfirmButton: true,
              // timer: 1500
          })
    } else {
      let route =  "{{ route('checkseet.masteritem') }}";
      $.ajax({
        url:      route,
        method:   'get',
        dataType: 'json',
        success:function(data){
          JSON.stringify(data);
          count_items_id = 0;
          count_catatan = 0;
          count_mark = 0;
          count_check = 0;
          
          for(var i = 0; i < data.length; i++){
            count_items_id++;
            count_catatan++;
            count_mark++;
            count_check++;
            var table = $('#table-checkseet-create').DataTable().row.add([
                data[i].items +
                "<input type='hidden' class='items-id' id='items_id"+count_items_id+"' value='"+ data[i].id +"'>",
                data[i].standard,
                "<input type='checkbox' class='form-control' id='mark"+count_mark+"'>"+
                "<input type='hidden' class='mark_desc' id='mark_desc"+count_mark+"'>",
                "<input type='text' class='form-control catatan' name='catatan' id='catatan"+count_catatan+"' value='-'>"
            ]).draw();

            $('#mark'+count_mark).on('change', function() {
                var checkboxId = $(this).attr('id');
                if ($(this).is(':checked')) {
                    // Ketika checkbox dicentang, set nilai input "baik"
                    $('#mark_desc'+checkboxId.substr(4)).val('baik');
                } else {
                    // Ketika checkbox tidak dicentang, kosongkan nilai input
                    $('#mark_desc'+checkboxId.substr(4)).val('-');
                }
            });
            

          }
        }
      })
    }
  })
  $('.submit-data').click(function(){
    let nama_pemakai = $('#nama-pemakai').val();
    tahun = $('#tahun').val();
    kode_asset = $('#kode-asset').val();
    jenis = $('#jenis').val();
    lama_pemeriksaan = $('#lama-pemeriksaan').val();
    semester = $('#semester').val();
    table_create = $('#table-checkseet-create').DataTable();
    // convert ke array
    conArray = table_create.rows().data().toArray();
    // hitung dengan length
    let len = conArray.length;
    // siapkan array kosong untuk wadah ketika nanti akan di push ke controller dan disimpan
    let dtcheckseetIn = [];
    // looping data tadi yang sudah di convert ke array, lalu select data items_id, mark, dan catatan untuk nanti disimpan ke db
    for (let i = 0; i < len; i++) {
      let items_id = table_create.rows({}).cell(i, 0).nodes().to$().find('input[class=items-id]').val();
      let mark = table_create.rows({}).cell(i, 2).nodes().to$().find('input[class=mark_desc]').val();
      let catatan = table_create.rows({}).cell(i, 3).nodes().to$().find('input[name=catatan]').val();
      let toArray = [
         items_id,
         mark,
         catatan,
      ];
          //push data ke controller
      dtcheckseetIn.push({
        nama_pemakai: nama_pemakai,
        tahun:tahun,
        kode_asset:kode_asset,
        jenis:jenis,
        lama_pemeriksaan:lama_pemeriksaan,
        semester:semester,
        items_id: toArray[0],
        mark: toArray[1],
        catatan: toArray[2]
      });
    }
    if (!nama_pemakai || !tahun || !kode_asset || !jenis || !lama_pemeriksaan || !semester) {
        Swal.fire({
          icon: 'warning',
          title: 'Warning!',
          text: 'Perhatikan Inputan Anda Form tidak boleh ada yang kosong.',
          showConfirmButton: true,
        });
    } else {
      if (len > 0) {
        let route = "{{ route('checkseet.store') }}";
        $.ajax({
              url: route,
              type: 'POST',
              data: JSON.stringify(dtcheckseetIn),
              success: function(response) {
                  if (response.status == true) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Berhasil menginput data Checkseet!',
                        showConfirmButton: true,
                      }).then(function(){
                          window.location.href = "{{ route('checkseet.index') }}";
                          var table =  $('#table-checkseet-create').DataTable();
                          table.rows().remove().draw(false);
                          $('#nama-pemakai').val("");
                          $('#tahun').val("");
                          $('#kode-asset').val("");
                          $('#jenis').val("");
                          $('#lama-pemeriksaan').val("");
                          $('#semester').val("");
                      });
                  } else {
                    Swal.fire({
                      icon: 'error',
                      title: 'Error!',
                      text: 'Ada Masalah dalam system, haraf hubungi TIM ICT Staff!',
                      timer: 5000
                    });
                  }
              },
              error: function(xhr, status, error) {
                  alert(status);
                  alert(xhr.responseText);
              }
          });
      } else {
             Swal.fire({
              icon: 'warning',
              title: 'Warning',
              text: 'Pastikan table items terisi untuk transaksi!',
              timer: 3000
            });
      }
      
    }
  })
  $(document).on('click','#refresh-form', function(){
    $('#nama-pemakai').val("");
    $('#tahun').val("");
    $('#kode-asset').val("");
    $('#jenis').val("");
    $('#lama-pemeriksaan').val("");
    $('#semester').val("");
    var table =  $('#table-checkseet-create').DataTable();
    table.rows().remove().draw(false);
  });

</script>

@endpush
