@extends('layouts.main')

@section('title')
    Store Dashboard
@endsection

@section('content')
    @include('includes.scriptdatatable')
    <!-- Section Content -->
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">Rekap Pemesanan Kendaraan</h2>
                <p class="dashboard-subtitle">
                    List of Rekap data
                </p>
                <form class="mb-3 p-3" action="{{ route('rekap.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="class">Tanggal Mulai</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <input class="form-control" name="tanggalawal" type="date" required>                                               
                         </div>
                    </div>
                    <div class="form-group mb-3">

                        <label for="class">Tanggal Akhir</label>
                        <div class="input-group">
                            <span class="input-group-text">
                                <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                            </span>
                            <input d class="form-control" name="tanggalakhir" type="date"  required>                                               
                         </div>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-primary" type="submit">Cek Rekap</button>
                    </div>
                </form>
            </div>
            @isset($data)
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-8">
                                            <p class="badge bg-primary badge-md">Rekap Absen : <b>{{ $tgl['mulai'] }}</b> -
                                                <b>{{ $tgl['akhir'] }}</b>
                                            </p>
                                        </div>    
                                        <div class="col-8">
                                            <a href="{{ route('export') }}?tgl_awal={{ $tgl['mulai']}}&tgl_akhir={{ $tgl['akhir']}}" class="btn btn-primary">Export Excel</a>
                                        </div>    
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover scroll-horizontal-vertical w-100 text-center">
                                            <thead>
                                                <tr>
                                                    <th>no</th>
                                                    <th>Nama Driver</th>
                                                    <th>Nama Kendaraan</th>
                                                    <th>Jenis Kendaraan</th>
                                                    <th>Nama Persetujuan 1</th>
                                                    <th>Nama Persetujuan 2</th>
                                                    <th>Status Pengembalian</th>
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
                                                        <td>{{ $item->Kendaraan->first()->namakendaraan}}</td>
                                                        <td>{{ $item->kendaraan->first()->jenis->jenis }}</td>
                                                        <td>{{ $item->atasan->first()->nama }}</td>
                                                        <td>{{ $item->atasan2->first()->nama }}</td>
                                                        <td>
                                                            @if ($item->tanggal_pengembalian == null)
                                                                Belum Kembali
                                                            @else
                                                                kembali
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- {{ $data->links('pagination::bootstrap-4') }} --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endisset
        </div>
    </div>

@endsection
