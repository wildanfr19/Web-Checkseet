<div class="modal fade bd-example-modal-lg" id="modal-view" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Show Data</h5>
            <button type="button"  class="close" data-dismiss="modal"><span>&times;</span></button>
          </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-inline">
                                <div class="form-group mr-2">
                                  <input type="text" class="form-control" disabled id="nama-pemakai-view" placeholder="Nama Pemakai">
                                </div>
                                <div class="form-group mr-2">
                                  <input type="date" class="form-control" disabled id="tahun-view" placeholder="Tahun">
                                </div>
                                <div class="form-group mr-2">
                                  <input type="text" class="form-control" disabled id="kode-asset-view" placeholder="Kode Asset">
                                </div>
                                <div class="form-group mr-2">
                                  <select name="jenis" id="jenis-view" disabled class="form-control">
                                    <option value="">- Pilih Jenis -</option>
                                    <option value="pc">PC</option>
                                    <option value="laptop">Laptop</option>
                                  </select>
                                </div>
                                <div class="form-group mr-1">
                                  <input type="number" class="form-control" disabled id="lama-pemeriksaan-view" placeholder="Lama Pemeriksaan">
                                </div>
                                <div class="form-group mr-1" style="margin-top: 0.4%">
                                    <select name="semester" id="semester-view" disabled class="form-control">
                                      <option value="">- Pilih Semester -</option>
                                      <option value="1">1</option>
                                      <option value="2">2</option>
                                    </select>
                                </div>
                              </form>
                              <table class="table table-bordered dataTable no-footer" id="table-checkseet-view">
                                <thead>
                                  <tr>
                                    <th scope="col" class="text-center">No.</th>
                                    <th scope="col" class="text-center">Items</th>
                                    <th scope="col" class="text-center">Standard</th>
                                    <th scope="col" class="text-center">Mark</th>
                                    <th scope="col" class="text-center">Catatan</th>
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
      </div>
    </div>
  </div>