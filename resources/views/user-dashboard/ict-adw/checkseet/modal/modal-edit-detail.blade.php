<div class="modal fade" id="modal-edit-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
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
                            <form id="form-items-edit-detail" method="post" action="javascript:void(0)">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <input type="hidden" id="id-items-edit-detail">
                                    <label for="items">Items:</label>
                                    <input type="text" class="form-control"readonly id="items-edit-detail" placeholder="Masukkan Nama Items">
                                </div>
                                <div class="form-group">
                                    <label for="standard">Standard:</label>
                                    <input type="text" class="form-control"  readonly id="standard-edit-detail" placeholder="Masukkan Standard">
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="check-mark-edit-detail">
                                    <label class="form-check-label" for="check-mark">Mark</label>
                                    <input type="hidden" class="form-control" name="mark" id="mark-edit-detail">
                                </div>
                                <div class="form-group">
                                    <label for="catatan">Catatan:</label>
                                    <input type="text" class="form-control" name="catatan" id="catatan-edit-detail" placeholder="Masukkan Catatan">
                                </div>
                                <!-- Tombol untuk menutup modal dan mengirim formulir (jika diperlukan) -->
                                <button type="button" class="btn btn-primary" id="submit-edit-detail">Update</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Back</button>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>