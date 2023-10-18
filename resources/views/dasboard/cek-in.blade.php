@extends('dasboard.layouts.layouts')
@section('title', 'Check-In')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Check-In </h1>
                <h5 class="mb-4">Buat Laporan Kamar Sekarang!!</h5>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                {{-- <div class="col-lg-10 mb-5">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Buat Laporan Sekarang!</h6>
                        </div>
                        <div class="card-body"> --}}
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
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $items->id }}">
                                                        Check-In
                                                      </button>
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="staticBackdrop{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <form action="{{route('transaksi')}}" method="POST">
                                                                @csrf
                                                                <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Check-In</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                            <label for="id_karyawan" class="form-label">Id Karyawan</label>
                                                                            <div class="input-group mb-3">
                                                                                <span class="input-group-text" id="basic-addon1">Nama Lengkap : {{ auth()->user()->nama_lengkap }} | ID :</span>
                                                                                <input type="text" class="form-control @error('id_karyawan') is-invalid @enderror" placeholder="Id Karyawan" value="{{ auth()->user()->id }}" name="id_karyawan" id="id_karyawan" readonly>
                                                                                <span class="text-danger">@error('id_karyawan') {{$message}} @enderror</span>
                                                                                <br>
                                                                            </div>
                                                                            {{-- status rooms --}}
                                                                            <input type="hidden" name="status_kamar" value="cek-out">
                                                                            {{-- End status rooms --}}
                                                                            <label for="id_kamar" class="form-label">Id Kamar</label>
                                                                            <input type="text" class="form-control @error('id_kamar') is-invalid @enderror" placeholder="Id Kamar" value="{{ $items->id }}" name="id_kamar" id="id_kamar" readonly>
                                                                            <span class="text-danger">@error('id_kamar') {{$message}} @enderror</span><br>
                                                                            <label for="nama_pelangan" class="form-label">Nama Pelangan</label>
                                                                            <input type="text" class="form-control @error('nama_pelangan') is-invalid @enderror" placeholder="Nama Pelangan" aria-label="Nama Pelangan" name="nama_pelangan" id="nama_pelangan">
                                                                            <span class="text-danger">@error('nama_pelangan') {{$message}} @enderror</span><br>
                                                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" aria-label="Metode Pembayaran" name="jenis_kelamin" id="jenis_kelamin">
                                                                                <option selected value="L">Laki-Laki</option>
                                                                                <option value="P">Perempuan</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('jenis_kelamin') {{$message}} @enderror</span><br>
                                                                            <label for="metode_pembayaran" class="form-label">Metode Pembayaran</label>
                                                                            <select class="form-select @error('metode_pembayaran') is-invalid @enderror" aria-label="Metode Pembayaran" name="metode_pembayaran" id="metode_pembayaran">
                                                                                <option selected value="Cash">Uang Tunai</option>
                                                                                <option value="Transfer">Transfer</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('metode_pembayaran') {{$message}} @enderror</span><br>
                                                                            <label for="status_pembayaran" class="form-label">Status Pembayaran</label>
                                                                            <select class="form-select @error('status_pembayaran') is-invalid @enderror" aria-label="Status Pembayaran" name="status_pembayaran" id="status_pembayaran">
                                                                                <option selected value="Sudah-Bayar">Sudah Bayar</option>
                                                                                <option value="Belum-Bayar">Belum Bayar</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('status_pembayaran') {{$message}} @enderror</span><br>
                                                                            <div class="row g-3">
                                                                                <div class="col">
                                                                                    <label for="cekin" class="form-label">Check-In</label>
                                                                                    <input type="date" class="form-control @error('cekin') is-invalid @enderror" name="cekin" id="cekin">
                                                                                    <span class="text-danger">@error('cekin') {{$message}} @enderror</span>
                                                                                </div>
                                                                                <div class="col">
                                                                                    <label for="cekout" class="form-label">Check-Out</label>
                                                                                    <input type="date" class="form-control @error('cekout') is-invalid @enderror" name="cekout" id="cekout">
                                                                                    <span class="text-danger">@error('cekout') {{$message}} @enderror</span>
                                                                                </div>
                                                                            </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                        <button class="btn btn-primary" type="submit" name="submit">Check-In Hare</button>
                                                                    {{-- End  --}}
                                                                    </div>
                                                                </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        @if(Session::has("cekin"))
                                                        {{-- Modal Next --}}
                                                        <div class="modal fade show">
                                                                <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Prosses Check-In</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                        {{-- Form Post Fungsi Buat Status Kamar Di Table Room Ganti Menjadi Check-Out --}}
                                                                        {{-- <form action="{{ route('masukkamar') }}" method="POST">
                                                                            @csrf --}}
                                                                            {{-- @method('PUT') --}}
                                                                            <div class="modal-body">
                                                                                <h1>Prosses Chack-In Sedang Berlangsung</h1>
                                                                                    <input type="text" name="status_kamar" id="status_kamar" value="cekout" hidden readonly>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button> --}}
                                                                                <button class="btn btn-primary" type="submit" name="submit">Check-In Hare</button>
                                                                                {{-- </form> --}}
                                                                            {{-- End  --}}
                                                                            </div>
                                                                </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        @endif
                                                    {{-- <button type="button" class="btn btn-primary">Check-In</button> --}}
                                                    {{-- <i class="fas fa-calendar fa-2x text-gray-300"></i> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
            </div>

        </div>
        <!-- /.container-fluid -->
@endsection