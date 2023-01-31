<!-- Modal-->
<div class="modal fade" id="varyModal" tabindex="-1" role="dialog" aria-labelledby="varyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="varyModalLabel">Tambah Data</h5>
          <button type="button" class="close r" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('provinsi.store') }}" method="POST">
          <div class="modal-body">
              @csrf
            <div class="form-group">
              <label class="form-label">Nama Provinsi</label>
                  <input type="text" name="provinsi"
                    class="form-control mb-2  @error('provinsi') is-invalid @enderror" placeholder="Nama Provinsi"
                    value="{{ old('provinsi') }}">
                  @error('provinsi')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                      </span>
                  @enderror
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn mb-2 btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- table -->