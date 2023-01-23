@extends('admin.layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
            <div class="card-header">
                <strong class="card-title">Data Produk</strong>
            </div>
            <form action="{{ route('produk.update',$produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group mb-3">
                            <label class="form-label">Name Kategori</label>
                            <select name="kategori_id" id="kategori"
                                class="form-control @error('kategori_id') is-invalid @enderror">
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori_id', $kategori->id) == $produk->kategori->id)
                                        <option value="{{ $kategori->id }}" selected>
                                            {{ $kategori->name }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->name }}
                                        </option>
                                    @endif
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
                                @foreach ($subKategoris as $subKategori)
                                    @if (old('sub_kategori_id', $subKategori->id) == $produk->subKategori->id)
                                        <option value="{{ $subKategori->id }}" selected>
                                            {{ $subKategori->name }}</option>
                                    @else
                                        <option value="{{ $subKategori->id }}">{{ $subKategori->name }}
                                        </option>
                                    @endif
                                @endforeach
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
                            placeholder="Nama Produk" value="{{ $produk->nama_produk }}" >
                            @error('nama_produk')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Hpp Produk</label>
                            <input type="number" name="hpp" class="form-control" @error('hpp') is-invalid @enderror
                            placeholder="Hpp Produk" value="{{ $produk->hpp }}">
                            @error('hpp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Harga Produk</label>
                            <input type="number" name="harga" class="form-control" @error('harga') is-invalid @enderror
                            placeholder="Harga Produk" value="{{ $produk->harga }}">
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="example-palaceholder">Stock Produk</label>
                            <input type="number" name="stok"
                            class="form-control @error('stok') is-invalid @enderror" placeholder="stok Produk"
                            value="{{ $produk->stok }}">
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
                                placeholder="diskon Produk" value="{{ $produk->diskon }}">
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
                                value="{{ $produk->deskripsi }}">{{ $produk->deskripsi }}</textarea>
                            @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                    </div> <!-- /.col -->
                </div>
                <div class="d-flex float-end">
                    <div class="col">
                        <button type="reset" class="btn btn-secondary mx-3">
                            Reset
                        </button>
                        <button type="submit" class="btn btn-primary">
                             Kirim
                        </button>
                    </div>
                </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-lg mb-4">
                <div class="card-header">
                    <strong class="card-title">Gambar Produk</strong>
                </div>
                <div class="card-body">
                    <form action="{{ route('image.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                        <div class="mb-3">
                            <label class="form-label">gambar produk</label>
                            <div class="custom-file">
                              <input type="file" class="custom-file-input @error('gambar_produk') is-invalid @enderror"
                                  name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
                              <label class="custom-file-label" for="customFile">Choose file</label>
                              @error('gambar_produk')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                        </div>
                        <button type="submit" class="mb-3 btn btn-primary">
                            Kirim
                       </button>
                    </form>
                    <div class="row mb-3">
                        @foreach ($images as $img)
                            <div class="col-md-6 mb-3 col-lg-6">
                                <div class="card-group">
                                    <div class="card shadow">
                                        <img src="{{ asset($img->gambar_produk) }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                           <form action="{{ Route('image.destroy', $img->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal"> Hapus </button>
                                                <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel {{ $img->id }}" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title " id="defaultModalLabel">Apakah Anda Yakin</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn mb-2 btn-primary">Hapus</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
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