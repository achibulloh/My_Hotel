@extends('dasboard.layouts.layouts')
@section('title', 'Laporan')
@section('style')
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css"> --}}
@endsection
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Laporan Transaksi</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
                        <div class="row g-3">
                            <form action="/filter" method="GET">
                                <div class="col">
                                    <input type="date" class="form-control" name="start_date" id="start_date">
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                </div>
                                <div class="col">
                                    <button type="button" class="form-control btn btn-primary" value="" >Filter Laporan</button>
                                </div>
                            </form>
                            <div class="col">
                                <button type="button" class="form-control btn btn-primary">Export PDF</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTables" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Id Karyawan </th>
                                        <th>Id Kamar </th>
                                        <th>Nama Pelangan </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Waktu Cek-In </th>
                                        <th>Waktu Chek-Out </th>
                                        <th>Metode Pembayaran </th>
                                        <th>Status Pembayaran </th>
                                        <th>Status </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th> # </th>
                                        <th>Id Karyawan </th>
                                        <th>Id Kamar </th>
                                        <th>Nama Pelangan </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Waktu Cek-In </th>
                                        <th>Waktu Chek-Out </th>
                                        <th>Metode Pembayaran </th>
                                        <th>Status Pembayaran </th>
                                        <th>Status </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($transaksi as $items)
                                        <tr>
                                            <td align=center >{{ $loop->iteration }}</td>
                                            <td align=center>{{ $items->id_karyawan }}</td>
                                            <td align=center>{{ $items->id_kamar }}</td>
                                            <td align=center>{{ $items->nama_pelangan }}</td>
                                            <td align=center>@if ( $items->jenis_kelamin == 'L') Laki-Laki @else ( $items->jenis_kelamin == 'P') Perempuan @endif</td> 
                                            <td align=center>{{ $items->cekin }}</td>
                                            <td align=center>{{ $items->cekout }}</td>
                                            <td align=center>{{ $items->metode_pembayaran }}</td>
                                            <td align=center>{{ $items->status_pembayaran }}</td>
                                            <td align=center>{{ $items->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->
        {{-- Script  --}}
        {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script> --}}
        {{-- End Script --}}
        {{-- <script type="text/javascript"> 
            $(document).ready(function () {
                $('#dataTables-1').DataTable({
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                });
            });
        </script> --}}
@endsection