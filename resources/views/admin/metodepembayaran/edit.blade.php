@extends('admin.layouts.admin')

@section('content')

<div class="card-deck w-50 mx-auto">
    <div class="card shadow mb-4">

        <div class="card-body">
            <form action="{{ route('metode.update', $metode->id) }}" method="post">
                @csrf
                @method('put')
      
                <div class="form-group">
                    <label class="form-label">Nama metode</label>
                    <input  type="text" name="metode"
                    class="form-control mb-2  @error('metode') is-invalid @enderror" placeholder="Metode Pembayaran"
                    value="{{ $metode->metode }}">
                </div>
                @error('metode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror
                <div class="text-right">
                    <a href="/admin/metode" class="btn btn-primary"><i class="fe fe-corner-up-left"></i></a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection