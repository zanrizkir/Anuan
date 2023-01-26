@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-conten-center">
        <div class="col-12">
            <h2 class="mb-2 page-title">
                Data User
            </h2>
            @include('sweetalert::alert')
            <div class="row my-4">
                <div class="col-md 12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table datatables table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Saldo</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @if (count($users))
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $loop->iteration }}
                                                    </div>
                                                </td>
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $user->name }}
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex">
                                                        {{ $user->email }}
                                                    </div>
                                                </td>
                                                
                                                
                                                <td>
                                                    <div class="d-flex">
                                                        Rp. {{ number_format($user->saldo, 0, ',', '.') }}
                                                    </div>
                                                </td>
                                               
                                                
                                                <td>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#defaultModal{{ $user->id }}"> Hapus </button>
                                                        <div class="modal fade" id="defaultModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
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
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3">
                                                <div class='alert alert-primary text-center'>
                                                    Tidak ada data
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection