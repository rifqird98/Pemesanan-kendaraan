@extends('layouts.main')

@section('title')
    Admin Absensi SMK Mofie
@endsection

@section('content')
    <!-- Section Content -->
    @include('includes.scriptdatatable')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
        <div class="container-fluid">
            <div class="dashboard-heading">
                <h2 class="dashboard-title">User</h2>
                <p class="dashboard-subtitle">
                    List Kehadiran Siswa
                </p>
            </div>
            <div class="dashboard-content">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        @foreach ($kelas as $item)
                            <div class="card mb-3" onclick="sendData()">
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-10">
                                            <h3>{{ $item->kelas }}</h3>
                                        </div>
                                        <div class="col-2">
                                            <a href="{{ route('detailkehadiran',$item->id) }}" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="auto" height="50"
                                                    fill="currentColor" class="bi bi-arrow-right-square-fill"
                                                    viewBox="0 0 16 16">
                                                    <path
                                                        d="M0 14a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12zm4.5-6.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5a.5.5 0 0 1 0-1z" />
                                                </svg>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- 
@push('addon-script')
    
<script>
    function sendData() {
      var id = document.getElementById('data').value;
  
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'kehadiran', true);
      xhr.setRequestHeader('Content-Type', 'application/json');
      xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
      xhr.send(JSON.stringify({ name: id }));
    }
  </script>
@endpush --}}
