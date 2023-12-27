@extends('layouts.user-app')
@section('title', 'Daftar Festival')
@section('contents')

<style>
    .dataTables_length label {
        display: flex;
        align-items: center;
    }

    .dataTables_length select {
        width: auto;
        margin-left: 5px;
    }

    .dataTables_filter label {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .dataTables_filter input[type="search"] {
        margin-left: 5px;
    }
</style>


    <section class="event-section" style="margin-top:100px">
        <div class="container py-5">
            <div class="section-title">
                <div class="label-title d-flex justify-content-between">
                    <h2>Riwayat Pembayaran Tiket</h2>
                </div>
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
        </div>
    </section>
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
