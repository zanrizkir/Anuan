@extends('admin.layouts.admin')

@section('content')

<div class="card-deck w-50 mx-auto">
    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                @csrf
                @method('put')
      
                <div class="form-group">
                    <div class="mb-3">
                        <label class="form-label">Name Kategori</label>
                        <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror">
                            @foreach ($sub as $kategori)
                                @if (old('kategori_id', $kategori->id) == $sub->kategori->id)
                                    <option value="{{ $kategori->id }}" selected hidden>{{ $kategori->name }}</option>
                                @else
                                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
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
                        <label class="form-label">Nama sub kategori</label>
                        <input type="text" name="name"
                            class="form-control mb-2  @error('name') is-invalid @enderror" placeholder="Nama Kategori"
                            value="{{ $subKategoris->name }}">
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