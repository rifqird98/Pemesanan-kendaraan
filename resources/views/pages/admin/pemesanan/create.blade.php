@extends('layouts.main')

@section('title')
    Tambah Pesanan Kendaraan
@endsection

@section('content')
    <!-- Section Content -->
    <div class="row p-5">
        <div class="col-12">
            <div class="card card-body border-0 shadow mb-4">
                <h2 class="h5 mb-4">Pemesanan Kendaraan</h2>
                <form method="post" action="{{ route('pemesanan.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div>
                                <label>Nama Driver</label>
                                <select class="form-select mb-0" aria-label="Gender select example" name="id_driver">
                                    <option>Nama Driver</option>
                                    @foreach ($driver as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div>
                                <label>Nama Kendaraan</label>
                                <select class="form-select mb-0" aria-label="Gender select example" name="kendaraan">
                                    <option>Nama Kendaraan</option>
                                    @foreach ($kendaraan as $item)
                                        <option value="{{ $item->id }}">{{ $item->namakendaraan}}||{{ $item->jenis->jenis}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <div class="col-md-6 mb-3">
                            <label for="birthday">Tanggal Peminjaman</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input class="form-control" name="tanggalpeminjaman" type="date"
                                    placeholder="dd/mm/yyyy" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="gender">Persetujuan 1</label>
                            <select class="form-select mb-0" aria-label="Gender select example" name="persetujuan_1">
                                <option>Persetujuan 1</option>
                                @foreach ($atasan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}||{{ $item->level->jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="persetujuan">Persetujuan 2</label>
                                <select class="form-select mb-0" aria-label="Gender select example" name="persetujuan_2">
                                    <option>Persetujuan 2</option>
                                    @foreach ($atasan as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}||{{ $item->level->jabatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <button class="btn btn-gray-800 mt-2 animate-up-2" type="submit">Save all</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
