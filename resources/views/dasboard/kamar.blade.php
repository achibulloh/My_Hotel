@extends('dasboard.layouts.layouts')
@section('title', 'Kamar')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Management Kamar</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahkamar" class="btn btn-primary"><i class="far fa-plus-square"></i> Tambah Kamar</button>
                        {{-- Modal Tambah Kamar --}}
                            <div class="modal fade" id="tambahkamar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data </h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('tambah_kamar') }}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Nama Kamar</span>
                                            <input type="text" class="form-control @error('nama_kamar') is-invalid @enderror" name="nama_kamar" placeholder="Masukan Nama Kamar" value="{{old('nama_kamar')}}"><br>
                                            <span class="text-danger">@error('nama_kamar') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Harga Kamar</span>
                                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" placeholder="Masukan Harga Kamar" value="{{old('harga')}}"><br>
                                            <span class="text-danger">@error('harga') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="kategori">Kategori Kamar</label>
                                            <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori">
                                                @foreach ($kategori as $items)
                                                    <option value="{{ $items->id }}">{{ $items->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger">@error('id_kategori') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="status_kamar">Status Kamar</label>
                                            <select class="form-select @error('status_kamar') is-invalid @enderror" name="status_kamar" id="status_kamar">
                                              <option selected value="cekin">Check-In</option>
                                              <option value="cekout">Check-Out</option>
                                            </select>
                                            <span class="text-danger">@error('status_kamar') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="status">Status</label>
                                            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                              <option value="active">Active</option>
                                              <option selected value="pending">Pending</option>
                                            </select>
                                            <span class="text-danger">@error('status') {{$message}} @enderror</span>
                                        </div>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cencel</button>
                                            <button class="btn btn-primary" type="submit" name="submit">Tambah Data Kamar Sekarang</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            
                            </div>
                        {{-- End Modal Tambah Kategori --}}
                        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kamar</th>
                                        <th>Nama Kategori</th>
                                        <th>Harga Kamar</th>
                                        <th>Status Kamar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kamar</th>
                                        <th>Nama Kategori</th>
                                        <th>Harga Kamar</th>
                                        <th>Status Kamar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($kamar as $items)
                                        <tr>
                                            <td align=center >{{ $loop->iteration }}</td>
                                            <td align=center>{{ $items->nama_kamar }}</td>
                                            @if(isset($items->kategori))
                                                <td align=center>{{ $items->kategori->nama_kategori }}</td>
                                            @else
                                                <td align=center>Data Tidak Ada</td>
                                            @endif
                                            {{-- <td align=center>{{ $items->kategori->nama_kategori }}</td> --}}
                                            <td align=center>{{$items->harga}}</td>
                                            {{-- <td align=center>@currency($items->harga)</td> --}}
                                            <td align=center>@if ($items->status_kamar == 'cekin')<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>Check-In</span> @elseif ($items->status_kamar == 'cekout') <span class="badge light badge-warning"><i class="fa fa-circle text-warning me-1"></i>Check-Out</span>@endif</td>
                                            <td align=center>@if ($items->status == 'active')<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>Active</span> @elseif ($items->status == 'pending') <span class="badge light badge-warning"><i class="fa fa-circle text-warning me-1"></i>Pending</span>@endif</td>
                                            <td align=center>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#lihatdata{{ $items->id }}" class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editdata{{ $items->id }}" class="btn btn-primary"><i class="far fa-edit"></i></button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#hapusdata{{ $items->id }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                {{-- Modal Lihat --}}
                                                    <div class="modal fade" id="lihatdata{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            @csrf
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lhat Data </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Nama Kamar</span>
                                                                        <input type="text" class="form-control" value="{{ $items->nama_kamar }}" readonly>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Kategori Kamar</span>
                                                                        <input type="text" class="form-control" value="{{ $items->kategori->nama_kategori }}" readonly>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Harga Kamar</span>
                                                                        <input type="text" class="form-control" value="{{ $items->harga }}" readonly>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Status Kamar</span>
                                                                        <input type="text" class="form-control" value="{{ $items->status_kamar }}" readonly>
                                                                    </div>
                                                                    <div class="input-group mb-3">
                                                                        <span class="input-group-text">Status</span>
                                                                        <input type="text" class="form-control" value="{{ $items->status }}" readonly>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editdata{{ $items->id }}" class="btn btn-danger">Ubah Data Sekarang</button>
                                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal" >Selesai</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        
                                                    </div>
                                                {{-- End Modal Lihat --}}
                                                {{-- Modal Edit Data --}}
                                                    <div class="modal fade" id="editdata{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            @csrf
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Data </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="{{ route('update_kamar',$items->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Nama Kamar</span>
                                                                            <input type="text" class="form-control" value="{{ $items->nama_kamar }}" readonly>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="kategori">Kategori Kamar</label>
                                                                            <select class="form-select @error('id_kategori') is-invalid @enderror" name="id_kategori" id="id_kategori">
                                                                                @foreach ($kategori as $itemss)
                                                                                    <option @if ($itemss->id == $items->id) selected @endif value="{{ $itemss->id }}">{{ $itemss->nama_kategori }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="text-danger">@error('id_kategori') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Harga Kamar</span>
                                                                            <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ $items->harga }}">
                                                                            <span class="text-danger">@error('harga') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="status_kamar">Status Kamar</label>
                                                                            <select class="form-select @error('status_kamar') is-invalid @enderror" name="status_kamar" id="status_kamar">
                                                                                    <option @if ($items->id == 'cekin') selected @endif value="cekin">Check-In</option>
                                                                                    <option @if ($items->id == 'cekout') selected @endif value="cekout">Check-Out</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('status_kamar') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="status">Status</label>
                                                                            <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                                                                                    <option @if ($items->id == 'active') selected @endif value="active">Active</option>
                                                                                    <option @if ($items->id == 'pending') selected @endif value="pending">Pending</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('status') {{$message}} @enderror</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cencel</button>
                                                                        <button class="btn btn-primary" type="submit" name="submit">Ubah Data Sekarang</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        
                                                    </div>
                                                {{-- End Modal Edit Data --}}
                                                {{-- Modal Hapus --}}
                                                    <div class="modal fade" id="hapusdata{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                    <div class="modal-body">
                                                                        <h5>Apakah Kamu Serius Akan Menghapus Data Ini {{ $items->nama_kategori }}</h5>
                                                                    </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cencel</button>
                                                                <form action="{{ route('hapus_kamar', $items->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-primary" type="submit" name="submit">Delete Hare</button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        
                                                    </div>
                                                {{-- End Modal Hapus --}}
                                            </td>
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
@endsection