@extends('admin.layouts.admin')

@section('content')

  <div class="card mx-auto col-md-10 shadow-lg mb-4">
    <div class="card-header">
      <strong class="card-title">Tambah Data</strong>
    </div>
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" >
      @csrf
      <div class="card-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group mb-3">
              <label class="form-label">Name Kategori</label>
              <select name="kategori_id" class="form-control select2 @error('kategori_id') is-invalid @enderror" id="simple-select2">
                <optgroup label="Pilih Kategori">
                  <option value="" hidden>Pilih Kategori</option>
                  @foreach ($kategoris as $kategori)
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                  @endforeach
                </optgroup>
              </select>
              {{-- <select name="kategori_id" id="kategori"
              class="form-control @error('kategori_id') is-invalid @enderror">
              @foreach ($kategoris as $kategori)
                  <option value="" hidden>Pilih Kategori</option>
                  <option value="{{ $kategori->id }}">{{ $kategori->name }}
                  </option>
              @endforeach
              </select> --}}
              @error('kategori_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            <div class="mb-3">
              <label for="multi-select2">Tag</label>
              <select class="form-control select2-multi @error('tag_id') is-invalid @enderror" id="multi-select2" name="tag_id[]">
                {{-- <option value="" hidden>Pilih Tag</option> --}}
                <optgroup label="Pilih Tag">
                  @foreach ($tag as $tg)
                  <option value="{{ $tg->id }}">{{ $tg->name }}</option>
                  @endforeach
                </optgroup>
              </select>
              @error('tag_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              {{-- <label class="form-label">Tag</label>
              <select name="tag_id" id="tag"
              class="form-control @error('tag_id') is-invalid @enderror">
              @foreach ($tag as $tg)
                  <option value="" hidden>Pilih Tag</option>
                  <option value="{{ $tg->id }}">{{ $tg->name }}
                  </option>
              @endforeach
              </select>
              @error('tag_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror --}}
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
              <input type="number" min="1"  name="hpp" class="form-control" @error('hpp') is-invalid @enderror
              placeholder="Hpp Produk" value="{{ old('name_produk') }}">
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Harga Produk</label>
              <input type="number" min="1" name="harga" class="form-control" @error('harga') is-invalid @enderror
              placeholder="Harga Produk" value="{{ old('name_produk') }}">
            </div>
            <div class="form-group mb-3">
              <label for="example-palaceholder">Stock Produk</label>
              <input type="number" min="1" name="stok"
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
                <input type="number" name="diskon" min="0"
                    class="form-control  @error('diskon') is-invalid @enderror"
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
              <input id="deskripsi" type="hidden" name="deskripsi" class="@error('deskripsi') is-invalid @enderror" >
              <trix-editor input="deskripsi"></trix-editor>
              @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
            
            {{-- <div class="form-group mb-3">
              <label for="example-palaceholder">Deskripsi</label>
              <textarea name="deskripsi" id="editor" cols="20" rows="5"
                  class="form-control  @error('deskripsi') is-invalid @enderror"
                  value="{{ old('deskripsi') }}"></textarea>
              @error('deskripsi')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div> --}}


            <div class="mb-3">
              <label class="form-label">gambar produk</label>
              
              <div class="custom-file">
                <input type="file" class="form-control-file @error('gambar_produk') is-invalid @enderror"
                    name="gambar_produk[]" value="{{ old('gambar_produk') }}" multiple>
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
            <a href="/admin/produk" class="btn btn-primary">Kembali</a>
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
  

@endsection