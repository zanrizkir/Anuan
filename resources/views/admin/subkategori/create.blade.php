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
              <form action="{{ route('subkategori.store') }}" method="POST">
              @csrf
              <div class="form-group">
                <div class="mb-3">
                    <label for="recipient-name" >Name Kategori</label>
                    <select name="kategori_id" class="form-control mb-3 @error('kategori_id') is-invalid @enderror">
                        @foreach ($kategoris as $kategori)
                            <option value="" hidden>Pilih Kategori</option>
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}
                            </option>
                        @endforeach
                </div>
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">Sub Kategori</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="Nama Sub Kategori"
                        value="{{ old('name') }}">
                    @error('name')
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