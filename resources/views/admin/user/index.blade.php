@extends('admin.layouts.admin')

@section('content')

<div class="container-fluid">
    <div class="row justify-conten-center">
        <div class="col-12">
            <h2 class="mb-2 page-title">
                Data User
            </h2>
            <div class="row my-4">
                <div class="col-md 12">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <table class="table datatables table-bordered table-hover" id="dataTable">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No</th>
                                        <th>Users</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Saldo</th>
                                        <th>Status</th>
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
                                                        <img src="{{ asset($user->profile) }}" alt="profile"
                                                            class="rounded-circle w-100" />
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
                                                    <div class="d-flex">
                                                        @if ($user->status == 'aktif')
                                                            <div class="badge rounded-pill bg-success w-100">{{ $user->status }}
                                                            </div>
                                                        @elseif ($user->status == 'tidak aktif')
                                                            <div class="badge rounded-pill bg-secondary w-100">{{ $user->status }}</div>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>
                                                    <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                            data-bs-target="#modalCenter{{ $user->id }}"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                                fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg>
                                                        </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="modalCenter{{ $user->id }}" tabindex="-1"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalCenterTitle">Apakah Anda Yakin?
                                                                        </h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">
                                                                            Kembali
                                                                        </button>
                                                                        <button type="submit" class="btn btn-danger">Hapus</button>
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