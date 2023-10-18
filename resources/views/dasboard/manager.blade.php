@extends('dasboard.layouts.layouts')
@section('title', 'Manager')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Management Manager</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#tambahmanager" class="btn btn-primary"><i class="far fa-plus-square"></i> Tambah Manager</button>
                        {{-- Modal Tambah Manager --}}
                            <div class="modal fade" id="tambahmanager" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Manager</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                    <form action="{{ route('tambah_manager') }}" method="POST">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Username</span>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukan Username" value="{{old('username')}}"><br>
                                            <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Nama Lengkap</span>
                                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukan Nama Lengkap"  value="{{old('nama_lengkap')}}"><br>
                                            <span class="text-danger">@error('nama_lengkap') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="jenis_kelamin">Jenis Kelamin</label>
                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                                    <option selected value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                            </select>
                                            <span class="text-danger">@error('jenis_kelamin') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Alamat</span>
                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" value="{{old('alamat')}}"><br>
                                            <span class="text-danger">@error('alamat') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Nomor Telepon</span>
                                            <input type="number" class="form-control @error('nomor_tlp') is-invalid @enderror" name="nomor_tlp" id="nomor_tlp" placeholder="Masukan Nomor Telepon" value="{{old('nomor_tlp')}}"><br>
                                            <span class="text-danger">@error('nomor_tlp') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Email</span>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Email" value="{{old('email')}}"><br>
                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text">Password</span>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password" value="{{old('password')}}"><br>
                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                        </div>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="status_akun">Status Akun</label>
                                            <select class="form-select @error('status_akun') is-invalid @enderror" name="status_akun" id="status_akun">
                                              <option selected value="active">Active</option>
                                              <option value="pending">Pending</option>
                                              <option value="blokir">Blokir</option>
                                            </select>
                                            <span class="text-danger">@error('status_akun') {{$message}} @enderror</span>
                                        </div>
                                        <input type="text" name="role" id="role" value="manager" hidden>
                                    </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cencel</button>
                                            <button class="btn btn-primary" type="submit" name="submit">Tambah Manager Sekarang</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            
                            </div>
                        {{-- End Modal Tambah Manager --}}
                        {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th>Username </th>
                                        <th>Nama Lengkap </th>
                                        <th>Nomor Telepon </th>
                                        <th>Email </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat </th>
                                        <th>Status Akun </th>
                                        <th>Role </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th> # </th>
                                        <th>Username </th>
                                        <th>Nama Lengkap </th>
                                        <th>Nomor Telepon </th>
                                        <th>Email </th>
                                        <th>Jenis Kelamin </th>
                                        <th>Alamat </th>
                                        <th>Status Akun </th>
                                        <th>Role </th>
                                        <th>Action </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($manager as $items)
                                        <tr>
                                            <td align=center >{{ $loop->iteration }}</td>
                                            <td align=center>{{ $items->username }}</td>
                                            <td align=center>{{ $items->nama_lengkap }}</td>
                                            <td align=center>{{ $items->nomor_tlp }}</td>
                                            <td align=center>{{ $items->email }}</td>
                                            <td align=center>@if ( $items->jenis_kelamin == 'L') Laki-Laki @else ( $items->jenis_kelamin == 'P') Perempuan @endif</td>
                                            <td align=center>{{ $items->alamat }}</td>
                                            <td>@if ($items->status_akun == 'active')<span class="badge light badge-success"><i class="fa fa-circle text-success me-1"></i>Active</span> @elseif ($items->status_akun == 'pending') <span class="badge light badge-warning"><i class="fa fa-circle text-warning me-1"></i>Pending</span> @else ($items->status_akun == 'blokir') <span class="badge light badge-danger"><i class="fa fa-circle text-denger me-1"></i>Blokir</span> @endif</td>
                                            <td>{{ $items->role }}</td>
                                            <td align=center>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#lihatmanager{{ $items->id }}" class="btn btn-secondary"><i class="fas fa-eye"></i></button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editmanager{{ $items->id }}" class="btn btn-primary"><i class="far fa-edit"></i></button>
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#hapus_manager{{ $items->id }}" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                                                {{-- Modal Lihat --}}
                                                    <div class="modal fade" id="lihatmanager{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            @csrf
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Lhat Data Manager </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Username</span>
                                                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukan Username" value="{{ $items->username }}" readonly><br>
                                                                            <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Nama Lengkap</span>
                                                                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukan Nama Lengkap"  value="{{ $items->nama_lengkap }}" readonly><br>
                                                                            <span class="text-danger">@error('nama_lengkap') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="jenis_kelamin">Jenis Kelamin</label>
                                                                            <input type="text" class="form-control" name="jenis_kelamin" value="{{ $items->jenis_kelamin }}" readonly>
                                                                            <span class="text-danger">@error('jenis_kelamin') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Alamat</span>
                                                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" value="{{ $items->alamat }}" readonly><br>
                                                                            <span class="text-danger">@error('alamat') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Nomor Telepon</span>
                                                                            <input type="number" class="form-control @error('nomor_tlp') is-invalid @enderror" name="nomor_tlp" id="nomor_tlp" placeholder="Masukan Nomor Telepon" value="{{ $items->nomor_tlp }}" readonly><br>
                                                                            <span class="text-danger">@error('nomor_tlp') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Email</span>
                                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Email" value="{{ $items->email }}" readonly><br>
                                                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Password</span>
                                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password" value="{{ $items->password }}" readonly><br>
                                                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="status_akun">Status Akun</label>
                                                                            <input type="text" name="status_akun" id="status_akun" class="form-control" value="{{ $items->status_akun }}" readonly>
                                                                            <span class="text-danger">@error('status_akun') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="role">Role Akun</label>
                                                                            <input type="text" name="status_akun" id="role" class="form-control" value="{{ $items->role }}" readonly>
                                                                            <span class="text-danger">@error('role') {{$message}} @enderror</span>
                                                                        </div>
                                                                        {{-- <input type="text" name="role" id="role" value="admin" hidden> --}}
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" data-bs-toggle="modal" data-bs-target="#editmanager{{ $items->id }}" class="btn btn-danger">Ubah Data Sekarang</button>
                                                                <button class="btn btn-primary" type="button" data-bs-dismiss="modal" >Selesai</button>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        
                                                    </div>
                                                {{-- End Modal Lihat --}}
                                                {{-- Modal Edit Data --}}
                                                    <div class="modal fade" id="editmanager{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            @csrf
                                                            <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Manager </h1>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="{{ route('update_manager',$items->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body">
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Username</span>
                                                                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Masukan Username" value="{{ $items->username }}"><br>
                                                                            <span class="text-danger">@error('username') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Nama Lengkap</span>
                                                                            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" name="nama_lengkap" placeholder="Masukan Nama Lengkap"  value="{{ $items->nama_lengkap }}"><br>
                                                                            <span class="text-danger">@error('nama_lengkap') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="jenis_kelamin">Jenis Kelamin</label>
                                                                            <select class="form-select @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin" id="jenis_kelamin">
                                                                                    <option {{$items->jenis_kelamin == 'L' ? 'selected' : ''}} value="L">Laki-Laki</option>
                                                                                    <option {{$items->jenis_kelamin == 'P' ? 'selected' : ''}} value="P">Perempuan</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('jenis_kelamin') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Alamat</span>
                                                                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Masukan Alamat Lengkap" value="{{ $items->alamat }}"><br>
                                                                            <span class="text-danger">@error('alamat') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Nomor Telepon</span>
                                                                            <input type="number" class="form-control @error('nomor_tlp') is-invalid @enderror" name="nomor_tlp" id="nomor_tlp" placeholder="Masukan Nomor Telepon" value="{{ $items->nomor_tlp }}"><br>
                                                                            <span class="text-danger">@error('nomor_tlp') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Email</span>
                                                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukan Email" value="{{ $items->email }}"><br>
                                                                            <span class="text-danger">@error('email') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <span class="input-group-text">Password</span>
                                                                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Masukan Password"><br>
                                                                            <span class="text-danger">@error('password') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="status_akun">Status Akun</label>
                                                                            <select class="form-select @error('status_akun') is-invalid @enderror" name="status_akun" id="status_akun">
                                                                            <option {{$items->status_akun == 'active' ? 'selected' : ''}} value="active">Active</option>
                                                                            <option {{$items->status_akun == 'pending' ? 'selected' : ''}} value="pending">Pending</option>
                                                                            <option {{$items->status_akun == 'blokir' ? 'selected' : ''}} value="blokir">Blokir</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('status_akun') {{$message}} @enderror</span>
                                                                        </div>
                                                                        <div class="input-group mb-3">
                                                                            <label class="input-group-text" for="role">Role Akun</label>
                                                                            <select class="form-select @error('role') is-invalid @enderror" name="role" id="role" @readonly(false)>
                                                                            <option {{$items->role == 'admin' ? 'selected' : ''}} value="admin">Admin</option>
                                                                            <option {{$items->role == 'manager' ? 'selected' : ''}} value="manager">Manager</option>
                                                                            <option {{$items->role == 'karyawan' ? 'selected' : ''}} value="karyawan">Karyawan</option>
                                                                            <option {{$items->role == 'user' ? 'selected' : ''}} value="user">User</option>
                                                                            </select>
                                                                            <span class="text-danger">@error('role') {{$message}} @enderror</span>
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
                                                {{-- Modal Hapus Manager --}}
                                                {{-- Bug Bagian Modal Di Manager Sama Admin --}}
                                                    <div class="modal fade" id="hapus_manager{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Data </h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                        <div class="modal-body">
                                                                            <h5>Apakah Kamu Serius Akan Menghapus Data Ini {{ $items->nama_lengkap }}</h5>
                                                                        </div>
                                                                    <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cencel</button>
                                                                    <form action="{{ route('hapus_manager', $items->id)}}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-primary" type="submit" name="submit">Delete Hare</button>
                                                                    </form>
                                                                    </div>
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