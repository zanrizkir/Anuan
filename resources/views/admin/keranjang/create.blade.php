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
        <form action="{{ route('keranjang.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="">
                    <div class=" mb-3">
                        <label class="form-label">Nama User</label>
                        <select name="user_id"
                            class="form-control @error('user_id') is-invalid @enderror">
                                @foreach ($users as $user)
                                    <option value="" hidden>Pilih Pembeli</option>
                                    <option value="{{ $user->id }}">{{ $user->name }}
                                    </option>
                                @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror    
                    </div>
                    <div class=" mb-3">
                        <label class="form-label">Nama Produk</label>
                        <select name="produk_id"
                            class="form-control @error('produk_id') is-invalid @enderror">
                            @foreach ($produks as $produk)
                                <option value="" hidden>Pilih Produk</option>
                                <option value="{{ $produk->id }}">{{ $produk->nama_produk }}
                                </option>
                            @endforeach
                        </select>
                        @error('produk_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-3">
                        <label class="form-label">Ukuran</label>
                        <select name="ukuran"
                            class="form-control @error('ukuran') is-invalid @enderror">
                            <option value="" hidden>Pilih Size</option>
                            <option value="S">S</option>
                            <option value="L">L</option>
                            <option value="X">X</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        @error('ukuran')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div> --}}
                    <div class="mb-3">
                        <label class="form-label">jumlah Produk</label>
                        <input type="number" name="jumlah"
                            class="form-control mb-2  @error('jumlah') is-invalid @enderror" placeholder="jumlah"
                            value="1">
                        @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                  Kembali
              </button>
              <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
      </form>
    </div>
  </div>
<!-- table -->