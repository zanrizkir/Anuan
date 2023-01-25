@extends('admin.layouts.admin')

@section('content')

  <div class="card mx-auto col-md-10 shadow-lg mb-4">
    <div class="card-header">
      <strong class="card-title">Tambah Data</strong>
    </div>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label class="form-label">Name Kategori</label>
              <select name="kategori_id" id="kategori"
              class="form-control @error('kategori_id') is-invalid @enderror">
              @foreach ($kategoris as $kategori)
                  <option value="" hidden>Pilih Kategori</option>
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}
                  </option>
              @endforeach
              </select>
              @error('kategori_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Sub Kategori</label>
              <select name="sub_kategori_id" id="sub_kategori"
                  class="form-control @error('sub_kategori_id') is-invalid @enderror">
                  <option value="" hidden>Pilih Kategori Terlebih dulu</option>
              </select>
              @error('sub_kategori_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
            <div class="form-group mb-3">
              <label for="example-password">Nama Produk</label>
              <input type="text" name="nama_produk" class="form-control"  @error('nama_produk') is-invalid @enderror 
              placeholder="Nama Produk" value="{{ old('name_produk') }}">
              @error('nama_produk')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Hpp Produk</label>
              <input type="number" name="hpp" class="form-control" @error('hpp') is-invalid @enderror
              placeholder="Hpp Produk" value="{{ old('name_produk') }}">
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Harga Produk</label>
              <input type="number" name="harga" class="form-control" @error('harga') is-invalid @enderror
              placeholder="Harga Produk" value="{{ old('name_produk') }}">
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Stock Produk</label>
              <input type="number" name="stok"
              class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
              value="0">
              @error('stok')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Diskon Produk</label>
              <div class="input-group mb-3">
                <input type="number" name="diskon"
                    class="form-control @error('diskon') is-invalid @enderror"
                    placeholder="diskon Produk" value="0">
                <button class="btn btn-secondary mb-2" type="button">%</button>
                @error('diskon')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Deskripsi</label>
              <textarea name="deskripsi" cols="20" rows="5"
                  class="form-control  @error('deskripsi') is-invalid @enderror" placeholder="deskripsi"
                  value="{{ old('deskripsi') }}"></textarea>
              @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label">gambar produk</label>
              <div class="custom-file">
                <input type="file" class="form-control-file @error('gambar_produk') is-invalid @enderror"
                    name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                {{-- <label class="custom-file-label" for="customFile">Choose file</label> --}}
                @error('gambar_produk')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
          </div>
          </div> <!-- /.col -->
          
        </div>
        <div class="d-flex float-end">
          <div class="col">
              <button type="reset" class="btn btn-secondary mx-3">
                reset
              </button>
              <button type="submit" class="btn btn-primary">
                  Kirim 
              </button>
          </div>
      </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#kategori').on('change', function() {
                var kategori_id = $(this).val();
                if (kategori_id) {
                    $.ajax({
                        url: '/admin/getSub_kategori/' + kategori_id,
                        type: "GET",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#sub_kategori').empty();
                                $('#sub_kategori').append(
                                    '<option hidden>Pilih Sub Kategori</option>');
                                $.each(data, function(key, sub_kategori) {
                                    $('select[name="sub_kategori_id"]').append(
                                        '<option value="' + sub_kategori.id + '">' +
                                        sub_kategori.name + '</option>');
                                });
                            } else {
                                $('#sub_kategori').empty();
                            }
                        }
                    });
                } else {
                    $('#sub_kategori').empty();
                }
            });
        });
    </script>

@endsection