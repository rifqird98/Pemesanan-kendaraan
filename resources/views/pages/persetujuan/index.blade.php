 @extends('layouts.main')
 @section('title')
     Persetujuan
 @endsection
 @section('content')
     <div class="container p-3">
         <div class="row">
             @foreach ($data as $item)
                 <div class="col-4">
                     <div class="card">
                         <div class="card-body">
                             <h5 class="card-title">Pemesanan Kendaraan</h5>
                         </div>
                         <ul class="list-group list-group-flush">
                             <li class="list-group-item"><b>Nama Driver :</b> {{ $item->driver->first()->nama }}</li>
                             <li class="list-group-item"><b> Kendaraan :</b> {{ $item->kendaraan->first()->namakendaraan }}
                             </li>
                             <li class="list-group-item"><b>Tanggal Peminjaman:</b> {{ $item->tanggal_peminjaman }}</li>
                             @if (Auth::user()->id_atasan == 1)
                                 <li class="list-group-item"><b>Status Persetujuan 1: </b>
                                     @if ($item->status1 == 0)
                                         <span class="badge badge-md bg-warning">Belum Disetujui</span>
                                     @else
                                         <span class="badge badge-md bg-success">Disetujui</span>
                                     @endif
                                 </li>
                             @elseif(Auth::user()->id_atasan == 2)
                                 <li class="list-group-item"><b>Status Persetujuan 1</b>
                                     @if ($item->status1 == 0)
                                         <span class="badge badge-md bg-warning">Belum Disetujui</span>
                                     @else
                                         <span class="badge badge-md bg-success">Disetujui</span>
                                     @endif
                                 </li>
                                 <li class="list-group-item"><b>Status Persetujuan 2</b>
                                     @if ($item->status2 == 0)
                                         <span class="badge badge-md bg-warning">Belum Disetujui</span>
                                     @else
                                         <span class="badge badge-md bg-success">Disetujui</span>
                                     @endif
                                 </li>
                             @endif
                         </ul>
                         <div class="card-body">
                             <a href="{{ route('status', $item->id) }}?atasan={{ Auth::user()->id_atasan }}"
                                 class="btn btn-primary">Setujui</a>
                         </div>
                     </div>
                 </div>
             @endforeach
         </div>
     </div>
 @endsection
