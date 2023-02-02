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
        <form action="{{ route('alamat.store') }}" method="POST" enctype="multipart/form-data">
            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">User</label>
                        <select name="user_id"
                          class="form-control @error('user_id') is-invalid @enderror">
                        @foreach ($users as $user)
                            <option value="" hidden>Pilih User</option>
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap"
                        class="form-control mb-2  @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap"
                        value="{{ old('nama_lengkap') }}">
                        @error('nama_lengkap')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">No Telpon</label>
                        <input type="tel" pattern="^\d{4}-\d{4}-\d{4}$" name="telpon"
                        class="form-control mb-2  @error('telpon') is-invalid @enderror" placeholder="No Telpon"
                        value="{{ old('telpon') }}">
                        @error('telpon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
              
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Name Provinsi</label>
                        <select name="provinsi_id" id="provinsi"
                            class="form-control @error('provinsi_id') is-invalid @enderror">
                        @foreach ($provinsi as $prov)
                            <option value="" hidden>Pilih Provinsi</option>
                            <option value="{{ $prov->id }}">{{ $prov->provinsi }}</option>
                        @endforeach
                        </select>
                        @error('provinsi_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Kota/Kabupaten</label>
                        <select name="kota_id" id="kota"
                            class="form-control @error('kota_id') is-invalid @enderror">
                            <option value="" hidden>Pilih Provinsi Terlebih dulu</option>
                        </select>
                        @error('kota_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Kecamatan</label>
                        <select name="kecamatan_id" id="kecamatan"
                            class="form-control @error('kecamatan_id') is-invalid @enderror">
                            <option value="" hidden>Pilih Kota Terlebih dulu</option>
                        </select>
                        @error('kecamatan_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>           
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Alamat</label>
                        <textarea name="alamat" cols="30" rows="3" class="form-control mb-2  @error('alamat') is-invalid @enderror"
                            placeholder="alamat" value="{{ old('alamat') }}"></textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Tag Alamat</label>
                        <select name="tag"
                            class="form-control @error('tag') is-invalid @enderror">
                            <option value="" hidden>Pilih Tag Alamat</option>
                            <option value="rumah">rumah</option>
                            <option value="kantor">kantor</option>
                        </select>
                        @error('tag')
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('#provinsi').on('change', function() {
            var provinsi_id = $(this).val();
            if (provinsi_id) {
                $.ajax({
                    url: '/admin/getKota/' + provinsi_id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#kota').empty();
                            $('#kota').append(
                                '<option hidden>Pilih Kota</option>');
                            $.each(data, function(key, kecamatans) {
                                $('select[name="kota_id"]').append(
                                    '<option value="' + kecamatans.id + '">' +
                                    kecamatans.kota + '</option>');
                            });
                        } else {
                            $('#kota').empty();
                        }
                    }
                });
            } else {
                $('#kota').empty();
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
        $('#kota').on('change', function() {
            var kota_id = $(this).val();
            if (kota_id) {
                $.ajax({
                    url: '/admin/getKecamatan/' + kota_id,
                    type: "GET",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    dataType: "json",
                    success: function(data) {
                        if (data) {
                            $('#kecamatan').empty();
                            $('#kecamatan').append(
                                '<option hidden>Pilih Kecamatan</option>');
                            $.each(data, function(key, kecamatans) {
                                $('select[name="kecamatan_id"]').append(
                                    '<option value="' + kecamatans.id + '">' +
                                    kecamatans.kecamatan + '</option>');
                            });
                        } else {
                            $('#kecamatan').empty();
                        }
                    }
                });
            } else {
                $('#kecamatan').empty();
            }
        });
    });
</script>