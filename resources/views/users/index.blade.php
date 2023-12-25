@extends('layouts.app')
@section('title', 'Daftar Users')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Users</h1>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah User</a>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatables" width="100%" cellspacing="0" id="datatables">
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Nomor Telepon</th>
                        <th style="text-align: center;">Role</th>
                        <th style="text-align: center;">Action</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $rs)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center">{{ $rs->name }}</td>
                            <td class="align-middle text-center">{{ $rs->email }}</td>
                            <td class="align-middle text-center">{{ $rs->phone_num }}</td>
                            <td class="align-middle text-center">{{ $rs->role }}</td>
                            <td class="align-middle text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    @if ($rs->id)
                                        <a href="{{ route('users.show', ['id' => $rs->id]) }}" style="margin-right: 10px;"
                                            class="btn btn-secondary">Detail</a>

                                        <a href="{{ route('users.edit', ['id' => $rs->id]) }}" style="margin-right: 10px;"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('events.destroy', $rs->id) }}" style="margin-right: 10px;"
                                            method="POST" onsubmit="return confirm('Delete?')" class="btn btn-danger p-0">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger m-0">Delete</button>
                                        </form>
                                    @endif
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">Tambahkan Festivalmu Terlebih Dahulu</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('datatables').DataTable({
                processing: true,
                serverSide: true,
            });
        });
    </script>
@endsection
