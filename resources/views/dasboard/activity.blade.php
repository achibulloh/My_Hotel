@extends('dasboard.layouts.layouts')
@section('title', 'Activity Log')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Activity Login</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Activity Semua User Online/Mengunakan Aplikasi Ini</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Last Seen</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Last Seen</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($users as $items)
                                        <tr>
                                            <td align=center >{{ $loop->iteration }}</td>
                                            <td align=center>{{ $items->nama_lengkap }}</td>
                                            <td align=center>{{ $items->email }}</td>
                                            <td align=center>
                                                @if(Cache::has('user-is-online-' . $items->id))
                                                    <span class="text-success">Online</span>
                                                @else
                                                    <span class="text-secondary">Offline</span>
                                                @endif
                                            </td>
                                            <td align=center>{{ \Carbon\Carbon::parse($items->last_seen)->diffForHumans() }}</td>
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