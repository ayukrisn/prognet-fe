@extends('layouts.app')
@section('title', 'Daftar Payment')
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Pembelian Tiket</h1>
    </div>
    <hr />
    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered datatables" width="100%" cellspacing="0" id="datatables" >
                <thead>
                    <tr>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: center;">Pembeli</th>
                        <th style="text-align: center;">Nama Event</th>
                        <th style="text-align: center;">Event Organizer</th>
                        <th style="text-align: center;">Jumlah Pembelian</th>
                        <th style="text-align: center;">Harga Satuan</th>
                        <th style="text-align: center;">Total Harga</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse ($payment as $rs)
                        <tr>
                            <td class="align-middle text-center">{{ $loop->iteration }}</td>
                            <td class="align-middle text-center">{{ $rs->user->name }}</td>
                            <td class="align-middle text-center">{{ $rs->event->name }}</td>
                            <td class="align-middle text-center">{{ $rs->event->user->name }}</td>
                            <td class="align-middle text-center">{{ $rs->quantity }}</td>
                            <td class="align-middle text-center">{{ $rs->event->price }}</td>
                            <td class="align-middle text-center">{{ $rs->total_harga }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">Belum ada pembelian tiket</td>
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
