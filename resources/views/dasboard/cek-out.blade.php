@extends('dasboard.layouts.layouts')
@section('title', 'Check-Out')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Buat Laporan Kamar Sekarang!! </h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                            @foreach ($kamar as $items)
                                <div class="col-xl-3 col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="h6 font-weight-bold text-primary text-uppercase mb-1">
                                                        {{ $items->nama_kamar }}</div>
                                                    <div class="h9 mb-0 font-weight-bold text-gray-800">{{$items->harga}}</div>
                                                </div>
                                                <div class="col-auto">
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#perpanjang{{ $items->id }}">
                                                        Perpanjang
                                                    </button>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout{{ $items->id }}">
                                                        Check-Out
                                                    </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="checkout{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Check-Out</h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('transaksi')}}" method="POST">
                                                                        @csrf
                                                                        <label for="exampleFormControlInput1" class="form-label">Id Karyawan</label>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text" id="basic-addon1">Nama Lengkap : {{ auth()->user()->nama_lengkap }} | ID :</span>
                                                                            <input type="text" class="form-control" placeholder="Id Karyawan" value="{{ auth()->user()->id }}" readonly><br>
                                                                        </div>
                                                                        <label for="exampleFormControlInput1" class="form-label">Id Kamar</label>
                                                                        <input type="text" class="form-control" placeholder="Id Kamar" value="{{ $items->id }}" readonly><br>
                                                                        <label for="exampleFormControlInput1" class="form-label">Nama Pelangan</label>
                                                                        <input type="text" class="form-control" placeholder="Nama Pelangan" aria-label="Nama Pelangan" value="{{ $items->nama_pelangan }}" readonly><br>
                                                                        <label for="exampleFormControlInput1" class="form-label">Metode Pembayaran</label>
                                                                        <input type="text" class="form-control" value="{{ $items->metode_pembayaran }}" readonly><br>
                                                                        <label for="exampleFormControlInput1" class="form-label">Status Pembayaran</label>
                                                                        <select class="form-select" aria-label="Status Pembayaran">
                                                                            <option selected value="Sudah-Bayar">Sudah Bayar</option>
                                                                            <option value="Belum-Bayar">Belum Bayar</option>
                                                                        </select><br>
                                                                        <div class="row g-3">
                                                                            <div class="col">
                                                                                <label for="exampleFormControlInput1" class="form-label">Check-In</label>
                                                                            <input type="date" class="form-control" placeholder="First name" value="{{ $items->cekin }}" readonly>
                                                                            </div>
                                                                            <div class="col">
                                                                            <label for="exampleFormControlInput1" class="form-label">Check-Out</label>
                                                                            <input type="date" class="form-control" id="kt_daterangepicker_5" value="{{ $items->cekout }}" readonly>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                <button type="button" name="submit" class="btn btn-primary">Check-In Hare</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        </div>
                                                    {{-- <button type="button" class="btn btn-primary">Check-In</button> --}}
                                                    {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- @else
                                <h3>Tidak Ada Data Check-Out</h3>
                            @endif --}}
            </div>

        </div>
        <!-- /.container-fluid -->
@endsection