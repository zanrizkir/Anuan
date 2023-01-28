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
            <form action="{{ route('topup.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                        <div class="col mb-3">
                            <label class="form-label">Nama User</label>
                            <select name="user_id"
                                class="form-control @error('user_id') is-invalid @enderror">
                                    @foreach ($users as $user)
                                        <option value="" hidden>Pilih User</option>
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
                    <div class="col mb-3">
                        <label for="recipient-name" class="col-form-label"> Jumlah Saldo </label>
                        <select name="saldo"
                            class="form-control @error('saldo') is-invalid @enderror">
                                <option value="" hidden>Pilih Nominal</option>
                                <option value="20000">20000</option>
                                <option value="50000">50000</option>
                                <option value="100000">100000</option>
                                <option value="150000">150000</option>
                                <option value="200000">200000</option>
                                <option value="500000">500000</option>
                        </select>
                        @error('saldo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror          
                    </div>
                    <div class="col mb-3">
                        <label class="form-label">Metode Pembayaran</label>
                        <select name="metode_pembayaran_id"
                            class="form-control @error('metode_pembayaran_id') is-invalid @enderror">
                            @foreach ($metode as $metod)
                                <option value="" hidden>Pilih Metode Pembayaran</option>
                                <option value="{{ $metod->id }}">{{ $metod->metode }}</option>
                            @endforeach
                        </select>
                        @error('metode_pembayaran_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
  </div>
<!-- table -->