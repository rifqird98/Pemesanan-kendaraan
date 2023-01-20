@extends('layouts.main')

@section('title')
    Pemesanan Records
@endsection

@section('content')
    <!-- Section Content -->
    @include('includes.scriptdatatable')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Pemesanan</h2>
                <p class="dashboard-subtitle">
                    List Pemesanan
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('pemesanan.create') }}" class="btn btn-primary mb-3">
                                    + Tambah Pemesanan
                                </a>
                                <div class="table-responsive">
                                    <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                        <thead>
                                            <tr>
                                                <th>no</th>
                                                <th>Nama Driver</th>
                                                <th>Nama Kendaraan</th>
                                                <th>Jenis Kendaraan</th>
                                                <th>Persetujuan 1</th>
                                                <th>Persetujuan 2</th>
                                                <th>Status Persetujuan 1</th>
                                                <th>Status Persetujuan 2</th>
                                                <th>Tanggal Peminjaman</th>
                                                <th>Tanggal Pengembalian</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $no = 1;
                                            @endphp
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td>{{ $item->driver->first()->nama }}</td>
                                                    <td>{{ $item->kendaraan->first()->namakendaraan }}</td>
                                                    <td>{{ $item->kendaraan->first()->jenis->jenis }}</td>
                                                    <td>{{ $item->atasan->first()->nama}}</td>
                                                    <td>{{ $item->atasan2->first()->nama}}</td>
                                                    <td>
                                                        @if ($item->status1 == 0)
                                                        <span class="badge badge-lg bg-warning">Belum Disetujui</span>
                                                        @else
                                                        <span class="badge badge-lg bg-success">Disetujui</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->status2 == 0)
                                                        <span class="badge badge-lg bg-warning">Belum Disetujui</span>
                                                        @else
                                                        <span class="badge badge-lg bg-success">Disetujui</span>
                                                        @endif

                                                    </td>
                                                    <td>{{ $item->tanggal_peminjaman }}</td>
                                                    <td>
                                                        @if ($item->tanggal_pengembalian == null)
                                                            Belum Kembali
                                                        @else
                                                        {{ $item->tanggal_pengembalian }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle"
                                                                    type="button" id="dropdownMenuButton1"
                                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Aksi
                                                                </button>
                                                                <ul class="dropdown-menu"
                                                                    aria-labelledby="dropdownMenuButton1">
                                                                    <form
                                                                        action="{{ route('pemesanan.destroy', $item->id) }}"
                                                                        method="post">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button class="dropdown-item"
                                                                            type="submit">Delete</button>
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                        </div>

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
            </div>
        </div>
    </div>
@endsection
