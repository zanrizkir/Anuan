<!-- Modal-->
<div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="subModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form action="{{ route('kota.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" >Name Provinsi</label>
                    <select name="provinsi_id" class="form-control mb-3 @error('provinsi_id') is-invalid @enderror">
                        @foreach ($provinsi as $prov)
                            <option value="" hidden>Pilih Provinsi</option>
                            <option value="{{ $prov->id }}">{{ $prov->provinsi }}
                            </option>
                        @endforeach
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Kota/Kabupaten</label>
                    <input type="text" name="kota"
                        class="form-control @error('kota') is-invalid @enderror" placeholder="Nama Kota"
                        value="{{ old('kota') }}">
                    @error('kota')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
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