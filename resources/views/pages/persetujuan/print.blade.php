<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Scripts -->
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <p>Absensi SMK Mofie</p>
                <p> tanggal :{{ $tgl }}</p>
            </div>
        </div>

        <div class="table table-striped">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>kelas</th>
                        <th>Keterangan</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $count = 1;
                    @endphp

                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $count++ }}</td>
                            <td>{{ $item->siswa->first()->nis }}</td>
                            <td>{{ $item->siswa->first()->nama }}</td>
                            <td>{{ $item->kelas->first()->kelas }}</td>
                            <td>
                                @if ($item->keterangan == null)
                                    @if ($item->status == 1)
                                        <span class="badge badge-lg bg-success">Hadir</span>
                                    @elseif($item->status == 2)
                                        <span class="badge badge-lg bg-warning">Terlambat</span>
                                    @else
                                        <span class="badge badge-lg bg-danger">Belum Absen</span>
                                    @endif
                                @elseif($item->keterangan == 'izin')
                                    <span class="badge badge-lg bg-success"> Izin </span>
                                @elseif($item->keterangan == 'sakit')
                                    <span class="badge badge-lg bg-warning">Sakit</span>
                                @else
                                    <span class="badge badge-lg bg-danger">Alpha</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>


</body>

</html>
