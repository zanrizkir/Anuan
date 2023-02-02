@extends('admin.layouts.admin')

@section('content')

  <div class="card mx-auto col-md-10 shadow-lg mb-4">
    <div class="card-header">
      <strong class="card-title">Tambah Data</strong>
    </div>
    <form action="{{ route('kecamatan.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group mb-3">
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
                    <div class="mb-3">
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
                    <div class="form-group mb-3">
                        <label for="example-password">Nama Kecamatan</label>
                        <input type="text" name="kecamatan" class="form-control"  @error('kecamatan') is-invalid @enderror 
                        placeholder="Nama Kecamatan" value="{{ old('name_produk') }}">
                        @error('kecamatan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex float-end">
          <div class="col">
            <a href="/admin/kecamatan" class="btn btn-primary">Kembali</a>
              <button type="submit" class="btn btn-primary">
                  Kirim 
              </button>
          </div>
      </div>
      </div>
    </form>
  </div>
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
                                $.each(data, function(key, kotas) {
                                    $('select[name="kota_id"]').append(
                                        '<option value="' + kotas.id + '">' +
                                        kotas.kota + '</option>');
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

@endsection