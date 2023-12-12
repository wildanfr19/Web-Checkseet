<div class="modal fade bd-example-modal-lg" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button"  class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline" id="form-items-edit-header" method="post" action="javascript:void(0)">
                                @csrf
                                @method('PUT')
                                <div class="form-group mr-2">
                                  <input type="hidden" id="id-items-edit-header">
                                  <input type="text" class="form-control" name="nama_pemakai" id="nama-pemakai-edit" placeholder="Nama Pemakai">
                                </div>
                                <div class="form-group mr-2">
                                  <input type="date" class="form-control" name="tahun" id="tahun-edit" placeholder="Tahun">
                                </div>
                                <div class="form-group mr-2">
                                  <input type="text" class="form-control" name="kode_asset" id="kode-asset-edit" placeholder="Kode Asset">
                                </div>
                                <div class="form-group mr-2">
                                  <select name="jenis" id="jenis-edit" class="form-control">
                                    <option value="">- Pilih Jenis -</option>
                                    <option value="pc">PC</option>
                                    <option value="laptop">Laptop</option>
                                  </select>
                                </div>
                                <div class="form-group mr-1">
                                  <input type="number" class="form-control" name="lama_pemeriksaan" id="lama-pemeriksaan-edit" placeholder="Lama Pemeriksaan">
                                </div>
                                <div class="form-group mr-1" style="margin-top: 0.4%">
                                    <select name="semester" id="semester-edit" class="form-control">
                                      <option value="">- Pilih Semester -</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                    </select>
                                </div>
                              </form>
                              <table class="table table-bordered dataTable no-footer" id="table-checkseet-edit">
                                <thead>
                                  <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Items</th>
                                    <th scope="col" class="text-center">Standard</th>
                                    <th scope="col" class="text-center">Mark</th>
                                    <th scope="col" class="text-center">Catatan</th>
                                    <th scope="col" class="text-center">Action</th>
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
        <div class="modal-footer">
            <button type="button"  class="btn btn-primary" id="update-header">Update</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>