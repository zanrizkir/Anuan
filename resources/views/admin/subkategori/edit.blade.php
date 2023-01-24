@extends('admin.layouts.admin')

@section('content')

<div class="card-deck w-50 mx-auto">
    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('subkategori.update', $sub->id) }}" method="post">
                @csrf
                @method('put')
      
                <div class="form-group">
                    <div class="mb-3">
                        <div class="form-group mb-3">
                            <label class="form-label">Name Kategori</label>
                            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                                @foreach ($kategori as $kategoris)
                                    @if (old('kategori_id', $kategoris->id) == $sub->kategori->id)
                                        <option value="{{ $kategoris->id }}" selected hidden>{{ $kategoris->name }}</option>
                                    @else
                                        <option value="{{ $kategoris->id }}">{{ $kategoris->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama sub kategori</label>
                        <input type="text" name="name"
                            class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama Kategori"
                            value="{{ $sub->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="text-right">
                    <a href="/admin/kategori" class="btn btn-primary"><i class="fe fe-corner-up-left"></i></a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection