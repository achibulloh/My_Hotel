@extends('dasboard.layouts.layouts')
@section('title', 'Profile')
@section('kondisi', 'active')
@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Profile Anda</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Foto Profile</h6>
                        </div>
                        {{-- Ubah Photo --}}
                            <div class="card-body">
                                <div class="chart-pie pt-4 pb-2">
                                    <div class="col-xl-9 col-lg-4">
                                        <img class="img-profile rounded-circle" src="@if(auth()->check()){{Auth::user()->photo == null ? asset('assets/img/undraw_profile.svg') : asset(Auth::user()->photo)}}@endif"><br>
                                    </div>
                                </div>
                                <div class="mt-4 text-center small">
                                    <div class="input-group">
                                        <input type="file" class="form-control @error('photo') is-invalid @enderror" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" name="photo" id="photo">
                                        <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">Ubah Foto Profile</button><br>
                                        <span class="text-danger">@error('nama_lengkap') {{$message}} @enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="card shadow mb-4">
                    <!-- Ubah Profile -->
                    <div class="col-xl-5 col-lg-5">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                            </div>
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;"
                                        src="img/undraw_posting_photo.svg" alt="...">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        <!-- /.container-fluid -->
@endsection